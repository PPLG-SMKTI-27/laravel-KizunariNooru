<style>
    @keyframes waveDrift1 {
        0% { transform: translateX(0) scaleY(1); }
        50% { transform: translateX(-15%) scaleY(1.05); }
        100% { transform: translateX(0) scaleY(1); }
    }
    @keyframes waveDrift2 {
        0% { transform: translateX(-20%) scaleY(1.05); }
        50% { transform: translateX(0) scaleY(0.95); }
        100% { transform: translateX(-20%) scaleY(1.05); }
    }
    @keyframes waveDrift3 {
        0% { transform: translateX(-5%) scaleY(0.98); }
        50% { transform: translateX(-25%) scaleY(1.08); }
        100% { transform: translateX(-5%) scaleY(0.98); }
    }
    .animate-wave1 {
        animation: waveDrift1 28s ease-in-out infinite;
    }
    .animate-wave2 {
        animation: waveDrift2 22s ease-in-out infinite;
    }
    .animate-wave3 {
        animation: waveDrift3 16s ease-in-out infinite;
    }
</style>

{{-- ══════════════════════════════════════════════════════
     DYNAMIC ISLAND NAV — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<nav id="dynamic-island-nav"
     x-data="{
         open: false,
         scrolled: false,
         activeSection: 'hero',
         updateActiveSection() {
             this.scrolled = window.scrollY > 20;
             const sections = ['hero', 'about', 'resume', 'skills', 'projects', 'services', 'contact'];
             for (const section of sections) {
                 const el = document.getElementById(section);
                 if (el && window.scrollY >= (el.offsetTop - 180)) {
                     this.activeSection = section;
                 }
             }
         }
     }"
     @scroll.window="updateActiveSection()"
     x-init="updateActiveSection()"
     @click.away="open = false"
     class="fixed top-6 left-1/2 -translate-x-1/2 z-[100] flex justify-center w-full px-4 transition-all duration-700 ease-[cubic-bezier(0.23,1,0.32,1)]">

    {{-- Main Vessel --}}
    <div :class="[
            open ? 'rounded-[2.5rem] p-6 w-full max-w-[350px]' : 'rounded-full px-4 py-2 w-full max-w-[350px] sm:max-w-[600px] md:max-w-5xl lg:max-w-6xl',
            scrolled
                ? 'bg-surface/30 backdrop-blur-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/10'
                : 'bg-surface/60 backdrop-blur-xl shadow-lg border border-white/20'
         ]"
         class="transition-all duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] flex flex-col relative group">

        {{-- Beautiful Ocean Wave Layers --}}
        <div class="absolute inset-0 pointer-events-none rounded-full overflow-hidden z-0">
            <svg class="absolute bottom-0 left-0 w-[150%] h-[180%] opacity-40 mix-blend-screen" viewBox="0 0 1440 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Wave 1 (Deep Blue / Cyan Gradient) -->
                <path class="animate-wave1" d="M0,80 C240,110 480,50 720,80 C960,110 1200,50 1440,80 L1440,120 L0,120 Z" fill="url(#wave-grad-1)"></path>
                <!-- Wave 2 (Neon Cyan / Translucent) -->
                <path class="animate-wave2" d="M0,50 C320,10 640,90 960,50 C1280,10 1440,70 1440,70 L1440,120 L0,120 Z" fill="url(#wave-grad-2)"></path>
                <!-- Wave 3 (Accent Cyan / Light Periwinkle) -->
                <path class="animate-wave3" d="M0,90 C180,60 360,110 540,90 C720,70 900,110 1080,90 C1260,70 1440,100 1440,100 L1440,120 L0,120 Z" fill="url(#wave-grad-3)"></path>
                
                <defs>
                    <linearGradient id="wave-grad-1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="var(--color-primary)" stop-opacity="0.12" />
                        <stop offset="100%" stop-color="var(--color-primary-2)" stop-opacity="0.25" />
                    </linearGradient>
                    <linearGradient id="wave-grad-2" x1="0%" y1="100%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="var(--color-primary)" stop-opacity="0.08" />
                        <stop offset="100%" stop-color="var(--color-accent)" stop-opacity="0.2" />
                    </linearGradient>
                    <linearGradient id="wave-grad-3" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="var(--color-primary-2)" stop-opacity="0.05" />
                        <stop offset="100%" stop-color="var(--color-primary)" stop-opacity="0.15" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        {{-- Interior Refraction Light (Moving with Mouse potentially) --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-primary/10 blur-[40px] rounded-full pointer-events-none group-hover:translate-x-20 transition-transform duration-1000"></div>

        <div class="flex items-center justify-between relative z-10 gap-2">

            {{-- Logo/Branding --}}
            <a href="/" class="flex items-center gap-2 group/logo pl-3 shrink-0">
                <div class="w-8 h-8 rounded-full overflow-hidden shadow-lg group-hover/logo:scale-110 transition-transform duration-500 ring-2 ring-primary/30">
                    <img src="{{ asset('Foto_pribadi.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="hidden sm:block font-display text-sm font-bold text-text tracking-widest uppercase">
                    FNR<span class="text-primary group-hover:animate-pulse">.</span>
                </span>
            </a>

            {{-- Desktop Links --}}
            <div class="hidden md:flex items-center gap-1 bg-bg/20 rounded-full p-1 border border-white/5 backdrop-blur-sm">
                @php
                    $links = [
                        ['href'=>'/#hero','label'=> __('Home'), 'id'=>'hero'],
                        ['href'=>'/projects','label'=> __('Works'), 'id'=>'projects'],
                        ['href'=>'/#services','label'=> __('Services'), 'id'=>'services'],
                        ['href'=>'/#contact','label'=> __('Contact'), 'id'=>'contact'],
                    ];
                @endphp

                @foreach($links as $link)
                <a href="{{ $link['href'] }}"
                   @click="activeSection = '{{ $link['id'] }}'"
                   :class="activeSection === '{{ $link['id'] }}'
                        ? 'text-primary bg-primary/10 shadow-[0_0_12px_rgba(34,211,238,0.2)] font-bold border border-primary/20'
                        : 'text-muted hover:text-text hover:bg-white/5 font-medium border border-transparent'"
                   class="px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] transition-all duration-500 rounded-full">
                    {{ $link['label'] }}
                </a>
                @endforeach
            </div>

            {{-- Action Group --}}
            <div class="flex items-center gap-1.5 pr-1">
                <a href="/#contact" class="hidden md:flex items-center justify-center px-5 py-2 bg-primary text-white font-bold text-[10px] uppercase tracking-wider rounded-full hover:scale-105 hover:shadow-[0_0_20px_rgba(34,211,238,0.4)] transition-all duration-300 shadow-lg shadow-primary/20">
                    {{ __('Get in Touch') }}
                </a>

                {{-- Language Switcher --}}
                <div x-data="{ langOpen: false }" class="relative">
                    <button @click="langOpen = !langOpen" @click.away="langOpen = false"
                            aria-label="Switch Language"
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-text hover:bg-primary/10 hover:border-primary/30 transition-all duration-500 shadow-inner">
                        @php
                            $localeMap = [
                                'en' => ['code' => 'gb', 'label' => 'EN'],
                                'id' => ['code' => 'id', 'label' => 'ID'],
                                'ja' => ['code' => 'jp', 'label' => 'JA'],
                            ];
                            $current = $localeMap[app()->getLocale()] ?? $localeMap['en'];
                        @endphp
                        <img src="https://flagcdn.com/w40/{{ $current['code'] }}.png" alt="{{ $current['label'] }}" class="w-5 h-auto rounded-sm">
                    </button>
                    <div x-show="langOpen" x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-90 -translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-90"
                         class="absolute right-0 top-12 w-44 bg-surface/90 backdrop-blur-2xl border border-border rounded-2xl shadow-2xl overflow-hidden z-50 p-1.5">
                        @foreach([
                            ['code' => 'en', 'flag' => 'gb', 'label' => 'English'],
                            ['code' => 'id', 'flag' => 'id', 'label' => 'Indonesia'],
                            ['code' => 'ja', 'flag' => 'jp', 'label' => '日本語'],
                        ] as $lang)
                            <a href="{{ route('locale.switch', $lang['code']) }}"
                               data-swup-ignore
                               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-300
                                      {{ app()->getLocale() === $lang['code'] ? 'bg-primary/10 text-primary border border-primary/20' : 'text-muted hover:bg-white/5 hover:text-text border border-transparent' }}">
                                <img src="https://flagcdn.com/w40/{{ $lang['flag'] }}.png" alt="{{ $lang['label'] }}" class="w-5 h-auto rounded-sm shadow-sm">
                                <span class="tracking-wider">{{ $lang['label'] }}</span>
                                @if(app()->getLocale() === $lang['code'])
                                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-primary"></span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Theme Toggle --}}
                <button id="theme-toggle"
                        aria-label="Toggle Color Theme"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-text hover:bg-primary hover:text-surface transition-all duration-500 shadow-inner group/btn">
                    <i id="theme-icon" class="fa-solid fa-moon text-xs group-hover/btn:rotate-[360deg] transition-transform duration-700"></i>
                </button>

                {{-- Mobile Menu Trigger --}}
                <button @click="open = !open"
                        aria-label="Toggle Mobile Menu"
                        class="md:hidden w-10 h-10 flex items-center justify-center rounded-full bg-primary text-surface shadow-lg hover:scale-105 active:scale-95 transition-all duration-500">
                    <div class="relative w-4 h-4">
                        <span :class="open ? 'rotate-45 translate-y-0' : '-translate-y-1'" class="absolute inset-0 w-full h-0.5 bg-current transition-all duration-500"></span>
                        <span :class="open ? 'opacity-0' : 'opacity-100'" class="absolute inset-0 w-full h-0.5 bg-current transition-all duration-500"></span>
                        <span :class="open ? '-rotate-45 translate-y-0' : 'translate-y-1'" class="absolute inset-0 w-full h-0.5 bg-current transition-all duration-500"></span>
                    </div>
                </button>
            </div>
        </div>

        {{-- Mobile Expanded Content --}}
        <div x-show="open"
             x-cloak
             x-transition:enter="transition ease-[cubic-bezier(0.23,1,0.32,1)] duration-500"
             x-transition:enter-start="opacity-0 max-h-0 scale-95"
             x-transition:enter-end="opacity-100 max-h-[500px] scale-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 max-h-[500px] scale-100"
             x-transition:leave-end="opacity-0 max-h-0 scale-95"
             class="relative z-10">

            <div class="mt-8 grid grid-cols-2 gap-3 pb-4">
                @foreach(['hero'=> __('Home'), 'about'=> __('About'), 'skills'=> __('Skills'), 'projects'=> __('Works'), 'services'=> __('Services'), 'contact'=> __('Contact')] as $id => $label)
                <a href="/#{{ $id }}"
                   @click="open = false; activeSection = '{{ $id }}'"
                   :class="activeSection === '{{ $id }}' ? 'bg-primary/20 border-primary/30 text-primary font-bold' : 'bg-white/5 border-white/5 text-muted'"
                   class="px-4 py-4 rounded-2xl border text-[10px] uppercase tracking-widest text-center transition-all duration-300 hover:bg-white/10">
                    {{ $label }}
                </a>
                @endforeach
            </div>

            <div class="border-t border-white/5 pt-6 pb-2 text-center">
                <p class="text-[9px] font-mono text-muted/40 uppercase tracking-[0.4em]">FNR Operating System v2.0</p>
            </div>
        </div>
    </div>
</nav>
