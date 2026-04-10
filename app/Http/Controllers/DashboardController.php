<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Petugas;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function komandan()
    {
        $totalPetugas = Petugas::count();

        $jadwals = Jadwal::with('petugas.user')
            ->whereDate('tanggal', now())
            ->get();

        return view('komandan.dashboard', compact('totalPetugas', 'jadwals'));
    }

    public function petugas()
    {
        $user = auth()->user();

        $jadwal = Jadwal::whereHas('petugas', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->whereDate('tanggal', now())
        ->get();

        return view('petugas.dashboard', compact('jadwal'));
    }
}
