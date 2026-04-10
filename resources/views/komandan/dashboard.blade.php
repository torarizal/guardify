@extends('layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Dashboard Komandan</h1>
        <div class="grid grid-cols-2 gap-4">

            <!-- Total Petugas -->
            <div class="bg-white p-4 rounded shadow font-bold">
                <h2>Total Petugas</h2>
                <p class="text-xl font-bold">{{ $totalPetugas }}</p>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="bg-white p-4 rounded shadow font-bold">
                <h2>Jadwal Hari Ini</h2>

            </div>

            <form method="POST" action="{{ route('schedule.generate') }}">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Generate Jadwal Hari Ini
                </button>
            </form>

            <div>
                <h2 class="text-xl font-bold mt-6 mb-3">Jadwal Petugas</h2>
                <table class="w-full border text-left">
                    <tr class="bg-gray-200">
                        <th class="p-2">Tanggal</th>
                        <th class="p-2">Shift</th>
                        <th class="p-2">Nama</th>
                    </tr>
            </div>
                @foreach($jadwals as $j)
                <tr>
                    <td class="p-2">{{ $j->tanggal }}</td>
                    <td class="p-2 capitalize">{{ $j->shift }}</td>
                    <td class="p-2">{{ $j->petugas->user->name }}</td>
                </tr>
                @endforeach
            </table>

        </div>

    </div>
@endsection
