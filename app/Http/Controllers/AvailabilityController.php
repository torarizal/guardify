<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
public function index()
{
    if (Auth::user()->role !== 'petugas') {
        abort(403);
    }

    $petugas = Auth::user()->petugas;
    $data = Availability::where('petugas_id', $petugas->id)->get();

    return view('availability.index', compact('data'));
}

public function store(Request $request)
{
     $request->validate([
        'tanggal' => 'required|date',
        'status' => 'required'
    ]);

    $petugas = Auth::user()->petugas;

    Availability::updateOrCreate(
        [
            'petugas_id' => $petugas->id,
            'tanggal' => $request->tanggal
        ],
        [
            'status' => $request->status
        ]
    );

    return back()->with('success', 'Availability disimpan');
}
}
