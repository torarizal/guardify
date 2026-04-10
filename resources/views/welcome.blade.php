<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FairGuard - Selamat Datang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .fade-in { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 font-sans selection:bg-blue-100 selection:text-blue-900">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Left: Logo -->
                <div class="flex items-center">
                    <i data-lucide="shield" class="w-8 h-8 text-blue-600 mr-2"></i>
                    <span class="text-xl font-bold tracking-tight text-slate-800">Guardify</span>
                </div>

                <!-- Right: Auth Navigation (Laravel Blade Reference) -->
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-2 md:gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-blue-600 hover:text-blue-600 border text-slate-700 rounded-lg text-sm font-bold transition-all"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-1.5 text-slate-600 border border-transparent hover:text-blue-600 rounded-lg text-sm font-bold transition-all"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-1.5 bg-blue-600 text-white border border-blue-600 hover:bg-blue-700 rounded-lg text-sm font-bold transition-all shadow-sm shadow-blue-200"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">

        <!-- SECTION: HERO -->
        <div class="space-y-16 fade-in">
            <section class="flex flex-col md:flex-row items-center gap-12 text-center md:text-left">
                <div class="flex-1 space-y-6">
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-50 text-blue-600 text-xs font-extrabold uppercase tracking-widest">
                        Smart Security Scheduling
                    </div>
                    <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-[1.1]">
                        Keamanan Lingkungan <br />
                        <span class="text-blue-600 underline decoration-blue-100 underline-offset-8">Lebih Adil & Teratur.</span>
                    </h1>
                    <p class="text-slate-500 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto md:mx-0">
                        Platform otomatisasi penjadwalan satpam berbasis ketersediaan dan algoritma fairness. Mengurangi konflik jadwal dan memastikan transparansi distribusi beban kerja.
                    </p>
                    <div class="pt-4 flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition-all flex items-center justify-center gap-2 group">
                            Mulai Sekarang
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#features" class="px-8 py-4 bg-white border border-slate-200 text-slate-600 rounded-2xl font-bold hover:bg-slate-50 transition-all text-center">
                            Pelajari Fitur
                        </a>
                    </div>
                </div>
                <div class="flex-1 hidden md:flex justify-end">
                    <div class="relative">
                        <div class="absolute -inset-10 bg-blue-200 rounded-full blur-[100px] opacity-20"></div>
                        <div class="bg-white p-8 rounded-[40px] shadow-2xl border border-slate-100 rotate-3 hover:rotate-0 transition-transform duration-500">
                             <i data-lucide="shield-check" class="w-40 h-40 text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION: FEATURES -->
            <section id="features" class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-10">
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i data-lucide="calendar" class="text-blue-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Otomasi Jadwal</h3>
                    <p class="text-slate-500 leading-relaxed">Susun jadwal mingguan secara otomatis berdasarkan slot ketersediaan yang diinput oleh masing-masing petugas.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition-colors">
                        <i data-lucide="bar-chart-3" class="text-purple-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Fairness Index</h3>
                    <p class="text-slate-500 leading-relaxed">Algoritma cerdas yang menghitung beban kerja agar terdistribusi merata, memastikan keadilan bagi seluruh regu.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 transition-colors">
                        <i data-lucide="arrow-left-right" class="text-emerald-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Pengajuan Tukar</h3>
                    <p class="text-slate-500 leading-relaxed">Sistem tukar shift yang terintegrasi. Petugas bisa mengajukan pertukaran jadwal dengan persetujuan admin yang cepat.</p>
                </div>
            </section>

            <!-- SECTION: NEWS -->
            <section class="pt-10 space-y-8">
                <div class="flex items-center gap-3">
                    <i data-lucide="newspaper" class="text-slate-400 w-6 h-6"></i>
                    <h2 class="text-2xl font-bold text-slate-800">Berita & Update</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 border border-slate-100 rounded-2xl hover:border-blue-200 transition-colors cursor-default">
                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded tracking-widest">SISTEM</span>
                        <h4 class="font-bold text-slate-800 mt-4">Pembaruan Algoritma v1.2</h4>
                        <p class="text-sm text-slate-500 mt-2">Kini mendukung perhitungan jeda istirahat dinamis antar shift malam dan pagi.</p>
                    </div>
                    <div class="bg-white p-6 border border-slate-100 rounded-2xl hover:border-blue-200 transition-colors cursor-default">
                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded tracking-widest">KEGIATAN</span>
                        <h4 class="font-bold text-slate-800 mt-4">Briefing Operasional</h4>
                        <p class="text-sm text-slate-500 mt-2">Seluruh regu keamanan diwajibkan melakukan validasi data ketersediaan setiap Jumat.</p>
                    </div>
                    <div class="bg-white p-6 border border-slate-100 rounded-2xl hover:border-blue-200 transition-colors cursor-default">
                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded tracking-widest">WARGA</span>
                        <h4 class="font-bold text-slate-800 mt-4">Laporan Keamanan Blok A</h4>
                        <p class="text-sm text-slate-500 mt-2">Efektivitas patroli meningkat 40% sejak implementasi sistem rotasi FairGuard.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center">
                    <i data-lucide="shield" class="w-6 h-6 text-slate-400 mr-2"></i>
                    <span class="text-lg font-bold text-slate-400">FairGuard</span>
                </div>
                <p class="text-slate-400 text-sm">© 2025 FairGuard System - Proyek Rekayasa Perangkat Lunak</p>
                <div class="flex gap-6 text-sm font-medium text-slate-400">
                    <a href="#" class="hover:text-blue-600 transition-colors">Bantuan</a>
                    <a href="#" class="hover:text-blue-600 transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();
    </script>
</body>

</html>
