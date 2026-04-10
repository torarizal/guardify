<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Availability;
use App\Models\Jadwal;
use App\Models\Absensi;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    public function generate()
{
    $tanggal = now()->toDateString();

    // hapus jadwal lama
    $jadwalIds = Jadwal::where('tanggal', $tanggal)->pluck('id');

    Absensi::whereIn('jadwal_id', $jadwalIds)->delete();

    Jadwal::where('tanggal', $tanggal)->delete();

    // ambil petugas available
    $available = \App\Models\Availability::where('tanggal', $tanggal)
        ->where('status', 1)
        ->pluck('petugas_id');

    $petugas = \App\Models\Petugas::whereIn('id', $available)->get();

    if ($petugas->isEmpty()) {
        return back()->with('error', 'Tidak ada petugas available');
    }

    // fairness (yang paling sedikit shift dulu)
    $petugas = $petugas->sortBy(function ($p) {
        return $p->jadwals()->count();
    })->values();

    $total = $petugas->count();

    // pembagian
    $jumlahPagi = floor($total / 2);
    $jumlahMalam = $total - $jumlahPagi; // sisanya ke malam

    // bagi collection
    $pagi = $petugas->slice(0, $jumlahPagi);
    $malam = $petugas->slice($jumlahPagi);

    // insert shift pagi
    foreach ($pagi as $p) {
        \App\Models\Jadwal::create([
            'petugas_id' => $p->id,
            'tanggal' => $tanggal,
            'shift' => 'pagi'
        ]);
    }

    // insert shift malam
    foreach ($malam as $p) {
        \App\Models\Jadwal::create([
            'petugas_id' => $p->id,
            'tanggal' => $tanggal,
            'shift' => 'malam'
        ]);
    }

    return back()->with('success', 'Jadwal berhasil dibuat!');
}
}
