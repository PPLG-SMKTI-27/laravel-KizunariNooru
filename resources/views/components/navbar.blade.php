{{-- ═══════════════════════════════════════
   FURINA NAVBAR — sticky + GSAP animated
═══════════════════════════════════════ --}}
<nav id="main-navbar" x-data="{ open: false, scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 60"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

    <div :class="scrolled
            ? 'bg-[#020814]/90 backdrop-blur-2xl shadow-[0_4px_30px_rgba(34,211,238,0.08)] border-b border-cyan-400/20'
            : 'bg-transparent'"
         class="transition-all duration-500">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 group" id="nav-logo">
                {{-- Animated crystal icon --}}
                <div class="relative w-10 h-10 flex-shrink-0">
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 opacity-70 group-hover:opacity-100 blur-sm transition"></div>
                    <div class="relative w-full h-full rounded-full bg-gradient-to-br from-cyan-300 to-blue-600 flex items-center justify-center shadow-inner border border-cyan-300/30">
                        <img src="{{ asset('photo-profile.jpeg') }}" alt="Profile" class="w-full h-full rounded-full object-cover">
                    </div>
                </div>
                <div>
                    <span class="font-cinzel text-lg font-bold tracking-wide text-white group-hover:text-cyan-200 transition">
                        Fahri<span class="text-cyan-400">.</span>dev
                    </span>
                    <div class="text-[9px] text-cyan-400/50 tracking-[0.2em] uppercase -mt-0.5">Fontaine Portfolio</div>
                </div>
            </a>

            {{-- Desktop nav --}}
            <div class="hidden md:flex items-center gap-1">
                @php
                $links = [
                    ['href'=>'/#hero','label'=>'Home'],
                    ['href'=>'/#about','label'=>'About'],
                    ['href'=>'/#resume','label'=>'Resume'],
                    ['href'=>'/#skills','label'=>'Skills'],
                    ['href'=>'/#projects','label'=>'Projects'],
                    ['href'=>'/#services','label'=>'Services'],
                    ['href'=>'/#contact','label'=>'Contact'],
                ];
                @endphp
                @foreach($links as $link)
                <a href="{{ $link['href'] }}"
                   class="relative px-4 py-2 text-sm text-blue-200/70 hover:text-cyan-200 transition duration-300 group rounded-lg hover:bg-cyan-400/5">
                    {{ $link['label'] }}
                    <span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-0 h-px bg-gradient-to-r from-transparent via-cyan-400 to-transparent group-hover:w-4/5 transition-all duration-300"></span>
                </a>
                @endforeach

                <div class="w-px h-5 bg-cyan-400/20 mx-2"></div>

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-cyan-500/80 to-blue-600/80 text-white text-sm font-semibold hover:from-cyan-400 hover:to-blue-500 transition shadow-lg shadow-cyan-900/30 border border-cyan-400/30">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="flex items-center gap-2 px-6 py-2 text-sm text-cyan-300 border border-cyan-400/30 rounded-xl hover:bg-cyan-400/10 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                @endauth
            </div>

            {{-- Mobile burger --}}
            <button @click="open = !open"
                    class="md:hidden p-2 rounded-lg border border-cyan-400/20 bg-cyan-400/5 text-blue-200 hover:text-cyan-300 hover:border-cyan-400/40 transition">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden border-t border-cyan-400/15 bg-[#020814]/95 backdrop-blur-2xl px-6 py-5 space-y-1">
            @foreach($links as $link)
            <a href="{{ $link['href'] }}" @click="open=false"
               class="block px-4 py-3 rounded-xl text-blue-200/80 hover:text-cyan-200 hover:bg-cyan-400/8 transition text-sm">
                {{ $link['label'] }}
            </a>
            @endforeach
            <div class="pt-3 border-t border-cyan-400/10 flex gap-3 mt-2">
                @auth
                    <a href="{{ url('/dashboard') }}" class="flex-1 text-center py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-sm font-semibold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"    class="flex-1 text-center py-2.5 rounded-xl border border-cyan-400/30 text-cyan-300 text-sm">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>