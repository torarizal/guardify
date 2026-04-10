<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class HistoryController extends Controller
{
    public function history()
    {
        $jadwals = Jadwal::with('petugas.user')
            ->where('tanggal', '<', now())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('history.history', compact('jadwals'));
    }
}
