<x-guest-layout>
    <!-- Overlay Full Screen untuk desain Guardify (Menimpa background default guest layout) -->
    <div class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-[#061022] bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#0f2e60] via-[#08162d] to-[#040b17] font-sans text-white overflow-y-auto">

        <!-- Back Button -->
        <a href="javascript:history.back()" class="absolute top-6 left-6 sm:top-8 sm:left-8 z-[60] flex items-center gap-2 px-4 py-2.5 bg-white/[0.03] hover:bg-white/[0.08] border border-white/[0.08] rounded-xl text-blue-200/70 hover:text-white transition-all backdrop-blur-md group cursor-pointer shadow-[0_0_15px_-5px_rgba(37,99,235,0.2)]">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="text-sm font-medium tracking-wide">Back</span>
        </a>
        
        <!-- Main Glass Card -->
        <div class="w-full max-w-[440px] bg-white/[0.03] backdrop-blur-2xl border border-white/[0.08] rounded-[2.5rem] p-8 sm:p-10 shadow-[0_0_60px_-15px_rgba(37,99,235,0.4)] relative mt-10 mb-20 md:my-0">

            <!-- Logo & Title Area -->
            <div class="flex flex-col items-center mb-10 text-center">
                <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(37,99,235,0.5)] mb-6">
                    <!-- Shield Icon -->
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-[28px] font-semibold text-white tracking-wide leading-tight mb-3">Guardify - Secure<br>Access</h2>
                <p class="text-[13px] text-blue-200/50 leading-relaxed max-w-[280px]">Enter your credentials to access the security architecture.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-[10px] font-bold tracking-widest text-blue-300/60 uppercase mb-2 ml-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-blue-300/40 font-medium text-base">@</span>
                        </div>
                        <input id="email"
                               class="block w-full pl-11 pr-4 py-3.5 bg-white/[0.04] border border-white/10 rounded-2xl text-sm text-white placeholder-blue-200/30 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white/[0.08] transition-all outline-none shadow-inner autofill:shadow-[inset_0_0_0px_1000px_#0b1d3a] autofill:[-webkit-text-fill-color:white]"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="architect@guardify.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs ml-1" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-[10px] font-bold tracking-widest text-blue-300/60 uppercase mb-2 ml-1">Secure Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-blue-300/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password"
                               class="block w-full pl-11 pr-4 py-3.5 bg-white/[0.04] border border-white/10 rounded-2xl text-sm text-white placeholder-blue-200/30 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white/[0.08] transition-all outline-none shadow-inner autofill:shadow-[inset_0_0_0px_1000px_#0b1d3a] autofill:[-webkit-text-fill-color:white]"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="••••••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs ml-1" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-8 px-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded-[4px] border-white/20 bg-white/5 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-0 focus:ring-offset-transparent w-4 h-4 transition-colors cursor-pointer" name="remember">
                        <span class="ms-2.5 text-[12px] font-medium text-blue-200/60 group-hover:text-blue-200 transition-colors">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-[12px] font-medium text-blue-600 hover:text-blue-400 transition-colors" href="{{ route('password.request') }}">
                            {{ __('Forgot key?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white text-[15px] font-semibold py-4 rounded-2xl transition-all flex justify-center items-center gap-2 group shadow-[0_4px_14px_0_rgba(37,99,235,0.39)] hover:shadow-[0_6px_20px_rgba(37,99,235,0.23)]">
                    {{ __('Authorize Access') }}
                    <svg class="w-4 h-4 group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>

            <!-- Bottom Card Attributes -->
            <div class="mt-8 pt-6 border-t border-white/10 flex justify-center gap-6 sm:gap-8 text-[9px] font-bold tracking-[0.15em] text-blue-300/40">
                <div class="flex items-center gap-1.5">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    AES-256 ENCRYPTED
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    BIOMETRIC ENABLED
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
