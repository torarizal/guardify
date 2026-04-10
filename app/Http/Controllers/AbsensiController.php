<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

    $jadwal = Jadwal::with('absensi')
        ->whereHas('petugas', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->whereDate('tanggal', now())
        ->get();

    return view('absensi.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'jadwal_id' => 'required',
        'foto' => 'required|image'
    ]);

    $user = auth()->user();
    $petugas = $user->petugas;

    $jadwal = Jadwal::findOrFail($request->jadwal_id);

    // ❗ anti double absen
    $cek = Absensi::where('jadwal_id', $jadwal->id)->first();
    if ($cek) {
        return back()->with('error', 'Sudah absen!');
    }

    $path = $request->file('foto')->store('absensi', 'public');

    Absensi::create([
        'petugas_id' => $petugas->id,
        'jadwal_id' => $jadwal->id,
        'tanggal' => now()->toDateString(),
        'foto' => $path
    ]);

    return back()->with('success', 'Absen berhasil!');
    }


    public function monitor()
    {
    $jadwal = Jadwal::with(['petugas.user', 'absensi'])
        ->whereDate('tanggal', now())
        ->get();

    return view('absensi.monitor', compact('jadwal'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
