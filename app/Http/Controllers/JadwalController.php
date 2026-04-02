<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
Petugas::all();
Shift::all();
Jadwal::create();

class JadwalController extends Controller
{

public function generate()
    {
        $tanggal = now()->toDateString();

        $petugas = Petugas::all();
        $shifts = Shift::all();

        foreach ($shifts as $shift) {

            // ambil petugas yang available
            $available = $petugas->filter(function ($p) use ($tanggal) {
                return $p->availabilities()
                    ->where('tanggal', $tanggal)
                    ->where('status', 1)
                    ->exists();
            });

            // fairness → urutkan berdasarkan jumlah shift
            $sorted = $available->sortBy(function ($p) {
                return $p->jadwals()->count();
            });

            $chosen = $sorted->first();

            if ($chosen) {
                Jadwal::create([
                    'petugas_id' => $chosen->id,
                    'shift_id' => $shift->id,
                    'tanggal' => $tanggal,
                ]);
            }
        }

        return back()->with('success', 'Jadwal berhasil dibuat!');
    }

}

