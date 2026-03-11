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

        <h2 class="font-cinzel text-2xl font-bold text-white mb-1">Create Account</h2>
        <p class="text-blue-300/50 text-sm">Join the realm of Fontaine</p>

        <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(34,211,238,0.4),transparent);margin:1.25rem auto;max-width:60%"></div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="auth-label">Full Name</label>
            <div class="relative">
                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-cyan-400/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                       required autofocus autocomplete="name"
                       class="auth-input pl-10"
                       placeholder="Fahri Noor Royyan">
            </div>
            @error('name')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

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
                       required autocomplete="username"
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
                       required autocomplete="new-password"
                       class="auth-input pl-10"
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="password_confirmation" class="auth-label">Confirm Password</label>
            <div class="relative">
                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-cyan-400/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       required autocomplete="new-password"
                       class="auth-input pl-10"
                       placeholder="••••••••">
            </div>
            @error('password_confirmation')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Terms notice --}}
        <div class="flex items-start gap-2 pt-1">
            <div class="w-4 h-4 rounded border border-cyan-400/25 bg-cyan-400/8 flex items-center justify-center mt-0.5 flex-shrink-0">
                <svg class="w-2.5 h-2.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-blue-300/40 text-[11px] leading-relaxed">
                By registering, you agree to the laws of Fontaine and swear to uphold justice in your web development journey.
            </p>
        </div>

        {{-- Submit --}}
        <button type="submit" class="auth-btn">
            <span class="flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Create Account ✨
            </span>
        </button>

        {{-- Login link --}}
        <div class="text-center pt-1">
            <span class="text-blue-300/45 text-sm">Already have an account? </span>
            <a href="{{ route('login') }}" class="auth-link font-semibold">Sign in →</a>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-cyan-400/10 text-center">
        <p class="text-blue-300/25 text-[10px] tracking-widest uppercase">Fontaine · Powered by Justice</p>
    </div>

</x-guest-layout>
