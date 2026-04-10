<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('manajemen_petugas.index', compact('petugas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manajemen_petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Petugas::create([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
    ]);

    return redirect('/petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(petugas $petugas)
    {
        return view('manajemen_petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, petugas $petugas)
    {
        $petugas->update([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
    ]);

    return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(petugas $petugas)
    {
        $petugas->delete();
    return redirect('/petugas');
    }
}
