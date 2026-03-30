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
            open ? 'rounded-[2.5rem] p-6 w-full max-w-[350px]' : 'rounded-full px-2 py-2 w-auto min-w-[200px] sm:min-w-[400px]',
            scrolled
                ? 'bg-surface/30 backdrop-blur-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/10'
                : 'bg-surface/60 backdrop-blur-xl shadow-lg border border-white/20'
         ]"
         class="transition-all duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] flex flex-col relative group">

        {{-- Interior Refraction Light (Moving with Mouse potentially) --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-primary/10 blur-[40px] rounded-full pointer-events-none group-hover:translate-x-20 transition-transform duration-1000"></div>

        <div class="flex items-center justify-between relative z-10 gap-2">

            {{-- Logo/Branding --}}
            <a href="/" class="flex items-center gap-2 group/logo pl-3 shrink-0">
                <div class="w-8 h-8 rounded-full overflow-hidden shadow-lg group-hover/logo:scale-110 transition-transform duration-500 ring-2 ring-primary/30">
                    <img src="{{ asset('photo-profile.jpeg') }}" alt="Profile" class="w-full h-full object-cover">
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
