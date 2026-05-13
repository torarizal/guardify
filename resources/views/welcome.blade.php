<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardify - Sistem Penjadwalan Petugas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts (Tailwind CSS via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900 font-sans">

    <!-- Navbar / Login Link -->
    <div class="relative w-full px-6 py-4 bg-white shadow-sm flex justify-between items-center">
        <div class="font-bold text-2xl text-blue-600 tracking-wider">
            GUARDIFY
        </div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-blue-600 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition">Log in</a>
                @endif
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6 lg:p-8 mt-8">

        <!-- Header Info -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-2">Jadwal Petugas Hari Ini</h1>
            <p class="text-gray-500">Sistem Penjadwalan & Rotasi Petugas Keamanan Perumahan</p>
            <p class="text-blue-600 font-medium mt-2">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
        </div>

        <!-- Shift Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Shift Siang -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-yellow-400">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">☀️ Shift pagi</h2>
                    <span class="text-sm font-medium text-gray-500">08:00 - 20:00</span>
                </div>

                <div class="p-6 grid grid-cols-2 sm:grid-cols-3 gap-6">
                    @forelse ($shiftpagi ?? [] as $jadwal)
                        <div class="flex flex-col items-center text-center">

                            {{-- Cek Foto di tabel Petugas atau tabel Users --}}
                            @if (isset($jadwal->petugas->photo) && $jadwal->petugas->photo)
                                <img src="{{ asset('storage/' . $jadwal->petugas->photo) }}" alt="Foto Petugas" class="w-20 h-20 rounded-full object-cover shadow-sm border-2 border-yellow-200 mb-3">
                            @elseif (isset($jadwal->petugas->user->photo) && $jadwal->petugas->user->photo)
                                <img src="{{ asset('storage/' . $jadwal->petugas->user->photo) }}" alt="Foto Petugas" class="w-20 h-20 rounded-full object-cover shadow-sm border-2 border-yellow-200 mb-3">
                            @else
                                {{-- Jika tidak ada foto, pakai inisial nama --}}
                                @php
                                    $namapagi = $jadwal->petugas->name ?? ($jadwal->petugas->user->name ?? 'Petugas');
                                @endphp
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($namapetugas) }}&background=fef08a&color=854d0e" alt="Default Avatar" class="w-20 h-20 rounded-full shadow-sm mb-3">
                            @endif

                            <h3 class="font-semibold text-sm text-gray-800">
                                {{ $jadwal->petugas->name ?? ($jadwal->petugas->user->name ?? 'Unknown') }}
                            </h3>
                            <span class="text-xs text-gray-500">Petugas Keamanan</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-4 text-gray-400">
                            <p>Tidak ada jadwal petugas untuk shift siang hari ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Shift Malam -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border-t-4 border-indigo-600">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800">🌙 Shift Malam</h2>
                    <span class="text-sm font-medium text-gray-500">20:00 - 08:00</span>
                </div>

                <div class="p-6 grid grid-cols-2 sm:grid-cols-3 gap-6">
                    @forelse ($shiftMalam ?? [] as $jadwal)
                        <div class="flex flex-col items-center text-center">

                            {{-- Cek Foto di tabel Petugas atau tabel Users --}}
                            @if (isset($jadwal->petugas->photo) && $jadwal->petugas->photo)
                                <img src="{{ asset('storage/' . $jadwal->petugas->photo) }}" alt="Foto Petugas" class="w-20 h-20 rounded-full object-cover shadow-sm border-2 border-indigo-200 mb-3">
                            @elseif (isset($jadwal->petugas->user->photo) && $jadwal->petugas->user->photo)
                                <img src="{{ asset('storage/' . $jadwal->petugas->user->photo) }}" alt="Foto Petugas" class="w-20 h-20 rounded-full object-cover shadow-sm border-2 border-indigo-200 mb-3">
                            @else
                                {{-- Jika tidak ada foto, pakai inisial nama --}}
                                @php
                                    $namaMalam = $jadwal->petugas->name ?? ($jadwal->petugas->user->name ?? 'Petugas');
                                @endphp
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($namaMalam) }}&background=c7d2fe&color=3730a3" alt="Default Avatar" class="w-20 h-20 rounded-full shadow-sm mb-3">
                            @endif

                            <h3 class="font-semibold text-sm text-gray-800">
                                {{ $jadwal->petugas->name ?? ($jadwal->petugas->user->name ?? 'Unknown') }}
                            </h3>
                            <span class="text-xs text-gray-500">Petugas Keamanan</span>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-4 text-gray-400">
                            <p>Tidak ada jadwal petugas untuk shift malam hari ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </main>
</body>
</html>
