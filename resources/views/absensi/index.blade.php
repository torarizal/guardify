@extends('layouts.app')

@section('content')
<div class="p-6">

<h2 class="text-xl font-bold mb-4">Absensi Hari Ini</h2>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-2 mb-3 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-200 text-red-800 p-2 mb-3 rounded">
        {{ session('error') }}
    </div>
@endif

@forelse($jadwal as $j)
<div class="border p-4 mb-4 rounded shadow">

    <p><b>Tanggal:</b> {{ $j->tanggal }}</p>
    <p><b>Shift:</b> {{ $j->shift }}</p>

    @if($j->absensi)
        <p class="text-green-600 font-bold mt-2">✔ Sudah absen</p>

        <img src="{{ asset('storage/'.$j->absensi->foto) }}" width="120" class="mt-2 rounded">

    @else
        <form method="POST" action="{{ route('absensi.store') }}" enctype="multipart/form-data" class="mt-3">
            @csrf

            <input type="hidden" name="jadwal_id" value="{{ $j->id }}">

            <input type="file" name="foto" required class="mb-2 block">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Kirim Absen
            </button>
        </form>
    @endif

</div>
@empty
<p>Tidak ada jadwal hari ini</p>
@endforelse

</div>
@endsection
