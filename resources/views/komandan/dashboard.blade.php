<x-app-layout>
    <!-- Wrapper Utama Dashboard (Mengatur background gelap & warna teks default) -->
    <!-- Catatan: Jika layout utama (app.blade.php) Anda memiliki background putih bawaan,
         pastikan Anda juga menyesuaikan background di file layout tersebut menjadi gelap. -->
    <div class="bg-[#0B1121] min-h-screen text-gray-200 p-6 md:p-8 font-sans">

        <!-- Top Header & Action Button -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <p class="text-blue-400 text-[11px] font-bold tracking-[0.2em] uppercase mb-1.5">Sentient Shield</p>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2 tracking-tight">Command Dashboard</h1>
                <p class="text-gray-400 text-sm flex items-center gap-2">
                    System status: <span class="text-blue-400 font-semibold">OPTIMIZED</span>
                    <span class="text-gray-600">•</span>
                    Today is {{ \Carbon\Carbon::now()->format('M d, Y') }}
                </p>
            </div>

            <!-- Tombol Generate form -->
            <form method="POST" action="{{ route('schedule.generate') }}">
                @csrf
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-5 py-3 rounded-xl text-sm font-semibold flex items-center gap-2 transition-all shadow-[0_0_20px_rgba(37,99,235,0.25)] hover:shadow-[0_0_25px_rgba(37,99,235,0.4)]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Generate Jadwal Hari Ini
                </button>
            </form>
        </div>

        <!-- Section: Cards Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <!-- Card: Total Personnel -->
            <div class="bg-[#131C31] rounded-2xl p-6 border border-white/5 relative overflow-hidden">
                <div class="flex justify-between items-start mb-6">
                    <h2 class="text-gray-400 text-[10px] font-bold tracking-widest uppercase">Total Personnel</h2>
                    <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>

                <div class="text-5xl font-extrabold text-white mb-2">{{ $totalPetugas }}</div>
                <div class="text-blue-400 text-sm flex items-center gap-1.5 mb-8 font-medium">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    +4 active this week
                </div>

                <div class="mt-auto">
                    <div class="w-full bg-[#0B1121] rounded-full h-1.5 border border-white/5">
                        <div class="bg-blue-500 h-1.5 rounded-full shadow-[0_0_10px_rgba(37,99,235,0.8)]" style="width: 82%"></div>
                    </div>
                </div>
            </div>

            <!-- Card: Jadwal Hari Ini -->
            <div class="lg:col-span-2 bg-[#131C31] rounded-2xl p-6 border border-white/5 flex flex-col justify-between">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-white font-bold text-lg">Jadwal Hari Ini</h2>
                        <p class="text-gray-400 text-sm mt-1">Shift distribution across sectors</p>
                    </div>
                    <span class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full text-[10px] font-bold tracking-widest uppercase">
                        Live Monitoring
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Shift Pagi -->
                    <div class="bg-[#0B1121] rounded-xl p-5 border border-white/5">
                        <div class="text-gray-400 text-[10px] font-bold tracking-widest uppercase mb-3">Pagi (06:00 - 14:00)</div>
                        <div class="flex items-baseline gap-2 text-white">
                            <span class="text-3xl font-extrabold">42</span>
                            <span class="text-sm font-medium text-gray-500">Petugas</span>
                        </div>
                    </div>
                    <!-- Shift Siang -->
                    <div class="bg-[#0B1121] rounded-xl p-5 border border-white/5">
                        <div class="text-gray-400 text-[10px] font-bold tracking-widest uppercase mb-3">Siang (14:00 - 22:00)</div>
                        <div class="flex items-baseline gap-2 text-white">
                            <span class="text-3xl font-extrabold">38</span>
                            <span class="text-sm font-medium text-gray-500">Petugas</span>
                        </div>
                    </div>
                    <!-- Shift Malam -->
                    <div class="bg-[#0B1121] rounded-xl p-5 border border-white/5">
                        <div class="text-gray-400 text-[10px] font-bold tracking-widest uppercase mb-3">Malam (22:00 - 06:00)</div>
                        <div class="flex items-baseline gap-2 text-white">
                            <span class="text-3xl font-extrabold">44</span>
                            <span class="text-sm font-medium text-gray-500">Petugas</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Section: Table Jadwal Petugas -->
        <div>
            <!-- Table Header / Title -->
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-bold text-white">Jadwal Petugas</h2>
                    <span class="px-2.5 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-lg text-[10px] font-bold tracking-wider uppercase">
                        Operational Log
                    </span>
                </div>
                <!-- Opsional: Filter/Sort icons -->
                <div class="flex gap-2 text-gray-400">
                    <button class="p-2 hover:bg-white/5 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg></button>
                    <button class="p-2 hover:bg-white/5 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg></button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-[#131C31] rounded-2xl border border-white/5 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-[#0B1121]/50 border-b border-white/5 text-gray-400 text-[10px] uppercase tracking-widest font-bold">
                                <th class="px-6 py-4">Personnel</th>
                                <th class="px-6 py-4">Shift Type</th>
                                <th class="px-6 py-4">Jam Duty / Tanggal</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm">
                            @forelse($jadwals as $j)
                            <tr class="hover:bg-white/[0.02] transition-colors group">

                                <!-- Personnel (Nama) -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <!-- Inisial Avatar -->
                                        <div class="w-9 h-9 rounded-full bg-blue-500/10 border border-blue-500/30 flex items-center justify-center text-blue-400 font-bold text-sm">
                                            {{ substr($j->petugas->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="text-white font-bold">{{ $j->petugas->user->name }}</div>
                                            <div class="text-gray-500 text-[11px] mt-0.5">ID: #SEC-{{ str_pad($j->petugas->id, 4, '0', STR_PAD_LEFT) }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Shift -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- Ikon dinamis berdasarkan shift -->
                                        @if(strtolower($j->shift) == 'pagi')
                                            <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        @elseif(strtolower($j->shift) == 'siang')
                                            <svg class="w-4 h-4 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" /></svg>
                                        @else
                                            <svg class="w-4 h-4 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                                        @endif
                                        <span class="text-gray-300 capitalize font-medium">{{ $j->shift }}</span>
                                    </div>
                                </td>

                                <!-- Jam Duty & Tanggal -->
                                <td class="px-6 py-4">
                                    <div class="text-white font-semibold flex items-center gap-2 mb-1.5">
                                        @if(strtolower($j->shift) == 'pagi') 06:00 - 14:00
                                        @elseif(strtolower($j->shift) == 'siang') 14:00 - 22:00
                                        @else 22:00 - 06:00 @endif

                                        <!-- Indikator Live jika hari ini -->
                                        @if($j->tanggal == \Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="px-1.5 py-0.5 bg-blue-600/20 text-blue-400 text-[9px] rounded font-bold">LIVE</span>
                                        @endif
                                    </div>
                                    <!-- Progress bar dummy -->
                                    <div class="w-32 h-1 bg-[#0B1121] rounded-full overflow-hidden border border-white/5 mb-1.5">
                                        <div class="h-full bg-blue-500 w-1/2"></div>
                                    </div>
                                    <div class="text-gray-500 text-[11px]">{{ \Carbon\Carbon::parse($j->tanggal)->format('d F Y') }}</div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4">
                                    @if($j->tanggal == \Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full text-[10px] font-bold tracking-widest">ON DUTY</span>
                                    @elseif($j->tanggal > \Carbon\Carbon::now()->format('Y-m-d'))
                                        <span class="px-3 py-1 bg-gray-500/10 text-gray-400 border border-gray-500/20 rounded-full text-[10px] font-bold tracking-widest">PENDING</span>
                                    @else
                                        <span class="px-3 py-1 bg-green-500/10 text-green-400 border border-green-500/20 rounded-full text-[10px] font-bold tracking-widest">COMPLETED</span>
                                    @endif
                                </td>

                                <!-- Action -->
                                <td class="px-6 py-4 text-center">
                                    <button class="text-gray-500 hover:text-white transition-colors p-1">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg>
                                    </button>
                                </td>

                            </tr>
                            @empty
                            <!-- Jika data jadwal kosong -->
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-10 h-10 mb-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
                                        <p>Belum ada jadwal yang di-generate hari ini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
