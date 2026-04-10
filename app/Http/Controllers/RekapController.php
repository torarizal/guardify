<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function rekap(Request $request)
    {
        // 🔥 ambil bulan & tahun (default = sekarang)
        $month = (int) ($request->month ?? now()->month);
        $year = (int) ($request->year ?? now()->year);

        // 🔥 total shift
        $totalShift = Jadwal::whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->count();

        $totalSiang = Jadwal::whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->where('shift', 'pagi')
            ->count();

        $totalMalam = Jadwal::whereMonth('tanggal', $month)
            ->whereYear('tanggal', $year)
            ->where('shift', 'malam')
            ->count();

        // 🔥 rekap per petugas
        $rekap = Petugas::with(['user', 'jadwals'])->get()->map(function ($p) use ($month, $year) {

            $jadwal = $p->jadwals->filter(function ($j) use ($month, $year) {
                return Carbon::parse($j->tanggal)->month == $month &&
                       Carbon::parse($j->tanggal)->year == $year;
            });

            return [
                'nama' => $p->user->name ?? '-',
                'total' => $jadwal->count(),
                'siang' => $jadwal->where('shift', 'pagi')->count(),
                'malam' => $jadwal->where('shift', 'malam')->count(),
            ];
        });

        // 🔥 ambil daftar bulan yang ada datanya
        $months = Jadwal::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('rekap.rekap', compact(
            'totalShift',
            'totalSiang',
            'totalMalam',
            'rekap',
            'months',
            'month',
            'year'
        ));
    }
}
