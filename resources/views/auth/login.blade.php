<x-guest-layout>

    {{-- Header --}}
    <div class="text-center mb-8">
        {{-- Mobile logo --}}
        <div class="lg:hidden flex justify-center mb-4">
            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-cyan-400/20 to-blue-600/20 border border-cyan-400/30 flex items-center justify-center"
                 style="box-shadow:0 0 25px rgba(34,211,238,0.2)">
                <svg class="w-7 h-7 text-cyan-300" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
        </div>

        <h2 class="font-display text-2xl font-bold text-white mb-1">Welcome Back</h2>
        <p class="text-blue-300/50 text-sm">Sign in to your Fontaine account</p>

        {{-- Decorative line --}}
        <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(34,211,238,0.4),transparent);margin:1.25rem auto;max-width:60%"></div>
    </div>

    {{-- Session Status --}}
    @if(session('status'))
    <div class="mb-5 px-4 py-3 rounded-xl border border-cyan-400/30 bg-cyan-400/8 text-cyan-300 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="auth-label">Email Address</label>
            <div class="relative">
                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-cyan-400/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required autofocus autocomplete="username"
                       class="auth-input pl-10"
                       placeholder="your@email.com">
            </div>
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="auth-label">Password</label>
            <div class="relative">
                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-cyan-400/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <input id="password" type="password" name="password"
                       required autocomplete="current-password"
                       class="auth-input pl-10"
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember + Forgot --}}
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2 cursor-pointer group">
                <div class="relative">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="sr-only peer">
                    <div class="w-4 h-4 rounded border border-cyan-400/30 bg-white/5 peer-checked:bg-cyan-500 peer-checked:border-cyan-400 transition flex items-center justify-center">
                        <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
                <span class="text-blue-300/60 text-xs group-hover:text-blue-200/80 transition">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link text-xs">
                    Forgot password?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit" class="auth-btn mt-2">
            <span class="flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Sign In
            </span>
        </button>

        {{-- Registration is disabled for admin-only use --}}
    </form>

    {{-- Decorative footer --}}
    <div class="mt-8 pt-6 border-t border-cyan-400/10 text-center">
        <p class="text-blue-300/25 text-[10px] tracking-widest uppercase">Fontaine · Powered by Justice</p>
    </div>

</x-guest-layout>
