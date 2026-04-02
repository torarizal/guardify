<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Availability;
use App\Models\Jadwal;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    public function generate()
    {
        $tanggal = now()->toDateString();

        // hapus jadwal lama
        Jadwal::where('tanggal', $tanggal)->delete();

        // ambil petugas yang available
        $available = Availability::where('tanggal', $tanggal)
            ->where('status', 1)
            ->pluck('petugas_id');

        $petugas = Petugas::whereIn('id', $available)->get();

        if ($petugas->isEmpty()) {
            return back()->with('error', 'Tidak ada petugas available');
        }

        // fairness
        $petugas = $petugas->sortBy(function ($p) {
            return $p->jadwals()->count();
        })->values();

        $shiftList = ['pagi', 'malam'];
        $jumlahPerShift = 4;

        $index = 0;

        foreach ($shiftList as $shift) {
            for ($i = 0; $i < $jumlahPerShift; $i++) {

                $selected = $petugas[$index % $petugas->count()];

                Jadwal::create([
                    'petugas_id' => $selected->id,
                    'tanggal' => $tanggal,
                    'shift' => $shift
                ]);

                $index++;
            }
        }

        return back()->with('success', 'Jadwal berhasil dibuat!');
    }
}
