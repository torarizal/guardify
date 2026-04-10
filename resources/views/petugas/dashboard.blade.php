@extends('layouts.app')

@section('content')
<div class="p-6">

<h2 class="text-xl font-bold mb-4">Dashboard Petugas</h2>

@if($jadwal->isNotEmpty())

    <div class="bg-green-100 border border-green-400 p-4 rounded mb-4">
        <p class="font-bold text-green-700">✔ Ada jadwal hari ini</p>
    </div>

    @foreach($jadwal as $j)
        <div class="border p-3 mb-2 rounded shadow">
            <p><b>Tanggal:</b> {{ $j->tanggal }}</p>
            <p><b>Shift:</b> {{ $j->shift }}</p>
        </div>
    @endforeach

@else

    <div class="bg-red-100 border border-red-400 p-4 rounded">
        <p class="font-bold text-red-700">❌ Tidak ada jadwal hari ini</p>
    </div>

@endif

</div>
@endsection
