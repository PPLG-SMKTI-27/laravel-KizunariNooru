{{-- ══════════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">

    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        {{-- Spline 3D Background - Interactive --}}
        <div class="absolute inset-0 z-0 opacity-25 pointer-events-auto mix-blend-screen scale-110">
            <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.51/build/spline-viewer.js"></script>
            <spline-viewer url="https://prod.spline.design/6Wq1Q7YGyM-iab9i/scene.splinecode"></spline-viewer>
        </div>
        
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[500px] rounded-full"
             style="background:radial-gradient(ellipse at center,rgba(34,211,238,0.09) 0%,transparent 70%)"></div>
    </div>

    {{-- Background decorative grid --}}
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none z-0"
         style="background-image:linear-gradient(rgba(34,211,238,1) 1px,transparent 1px),linear-gradient(90deg,rgba(34,211,238,1) 1px,transparent 1px);background-size:60px 60px;">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 flex flex-col lg:flex-row items-center gap-12 lg:gap-20 py-20 pointer-events-none">
        {{-- Added pointer-events-none to the container but pointer-events-auto to inner contents to allow interaction with 3D bg --}}
        
        {{-- ── LEFT COLUMN ── --}}
        <div class="flex-1 text-center lg:text-left pointer-events-auto">

            {{-- Status badge --}}
            <div id="hero-badge" class="inline-flex items-center gap-3 px-4 py-2 rounded-full border border-cyan-500/20 bg-cyan-500/10 text-cyan-400 text-[11px] font-semibold tracking-widest mb-8 backdrop-blur-md shadow-[0_0_15px_rgba(6,182,212,0.1)]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-400"></span>
                </span>
                AVAILABLE FOR OPPORTUNITIES
            </div>

            {{-- Main heading --}}
            <h1 id="hero-title" class="mb-6 flex flex-col gap-1">
                <span class="font-cinzel text-[clamp(2.5rem,6vw,5rem)] font-black leading-none tracking-normal text-slate-100 block gsap-char drop-shadow-lg">
                    Fahri Noor
                </span>
                <span class="font-cinzel text-[clamp(2.5rem,6vw,5rem)] font-black leading-none tracking-normal block text-cyan-grad drop-shadow-xl">
                    Royyan
                </span>
            </h1>

            {{-- Typewriter subtitle --}}
            <div class="font-playfair text-xl text-slate-400/80 italic mb-4 min-h-[2.5rem] flex items-center justify-center lg:justify-start gap-2">
                <span id="typewriter" class="text-cyan-400 font-medium tracking-wide"></span>
                <span class="w-0.5 h-6 bg-cyan-400 animate-pulse inline-block"></span>
            </div>

            <p class="text-slate-300/80 text-base max-w-lg leading-relaxed mb-10 mx-auto lg:mx-0 font-light">
                Crafting elegant and precise digital experiences, inspired by the refined aesthetics of
                <span class="text-cyan-400 font-medium">Fontaine</span> where every line of code flows
                with purpose, beauty, and calculated grace.
            </p>

            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <a href="#projects" class="btn-primary btn-glow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                    Explore Works
                </a>
                <a href="#contact" class="btn-outline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contact Me
                </a>
            </div>

            {{-- Quick stats row --}}
            <div class="mt-12 flex gap-10 justify-center lg:justify-start">
                @foreach([['value'=>'2','suf'=>'+','label'=>'Years Learning'],['value'=>$projectCount,'suf'=>'+','label'=>'Projects'],['value'=>'5','suf'=>'+','label'=>'Technologies']] as $stat)
                <div class="text-center lg:text-left">
                    <div class="font-cinzel text-[1.75rem] font-bold text-slate-100 mb-1 drop-shadow-md">
                        <span data-count="{{ $stat['value'] }}" data-suffix="{{ $stat['suf'] }}">{{ $stat['value'] }}{{ $stat['suf'] }}</span>
                    </div>
                    <div class="text-cyan-500/70 text-[11px] font-semibold tracking-widest uppercase">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ── RIGHT COLUMN — Furina Art ── --}}
        <div class="flex-shrink-0 relative pointer-events-auto" id="hero-art">
            <div class="relative w-72 h-72 md:w-[380px] md:h-[380px]">

                {{-- Outer ring spin --}}
                <svg class="absolute inset-0 w-full h-full spin-slow opacity-10" viewBox="0 0 400 400">
                    <circle cx="200" cy="200" r="185" fill="none" stroke="#06b6d4" stroke-width="1" stroke-dasharray="12 6"/>
                    <circle cx="200" cy="200" r="185" fill="none" stroke="url(#ringGrad)" stroke-width="2" stroke-dasharray="60 300" opacity=".7"/>
                    <defs>
                        <linearGradient id="ringGrad" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#06b6d4"/>
                            <stop offset="100%" stop-color="transparent"/>
                        </linearGradient>
                    </defs>
                </svg>

                {{-- Inner ring reverse spin --}}
                <svg class="absolute inset-6 w-[calc(100%-3rem)] h-[calc(100%-3rem)] spin-rev opacity-5" viewBox="0 0 300 300">
                    <circle cx="150" cy="150" r="140" fill="none" stroke="#67e8f9" stroke-width="1" stroke-dasharray="4 8"/>
                </svg>

                {{-- 6 orbital dots --}}
                <svg class="absolute inset-0 w-full h-full spin-slow" viewBox="0 0 400 400" style="animation-duration:8s">
                    <circle cx="200" cy="15"  r="4" fill="#22d3ee" opacity=".9"/>
                    <circle cx="370" cy="115" r="3" fill="#67e8f9" opacity=".7"/>
                    <circle cx="370" cy="285" r="3" fill="#22d3ee" opacity=".6"/>
                    <circle cx="200" cy="385" r="4" fill="#67e8f9" opacity=".8"/>
                    <circle cx="30"  cy="285" r="3" fill="#22d3ee" opacity=".6"/>
                    <circle cx="30"  cy="115" r="3" fill="#67e8f9" opacity=".7"/>
                </svg>

                {{-- Main portrait frame --}}
                <div class="absolute inset-10 rounded-full overflow-hidden border-2 border-cyan-400/35 pulse-glow">
                    <div class="w-full h-full relative" style="background:linear-gradient(165deg,#061540 0%,#0a2060 45%,#040e30 100%)">

                        {{-- Water shimmer overlay --}}
                        <div class="absolute inset-0" style="background:linear-gradient(0deg,rgba(34,211,238,0.2) 0%,transparent 55%)"></div>

                        {{-- Furina SVG Character --}}
                        <svg class="absolute bottom-0 left-1/2 -translate-x-1/2 w-52 h-52 md:w-64 md:h-64" viewBox="0 0 200 230" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Dress -->
                            <path d="M55 200 Q100 175 145 200 Q162 222 130 232 Q100 242 70 232 Q38 222 55 200Z" fill="#152b7a"/>
                            <path d="M60 194 Q100 168 140 194 Q155 210 128 222 Q100 232 72 222 Q45 210 60 194Z" fill="#1e3d9a"/>
                            <!-- White ruffles -->
                            <path d="M50 204 C70 192,90 188,100 190 C110 188,130 192,150 204" stroke="white" stroke-width="1.5" opacity=".45" fill="none"/>
                            <path d="M44 214 C65 202,85 198,100 200 C115 198,135 202,156 214" stroke="white" stroke-width="1" opacity=".25" fill="none"/>
                            <!-- Gold trim -->
                            <path d="M52 204 Q100 186 148 204" stroke="#f0c040" stroke-width="1" opacity=".55" fill="none"/>
                            <!-- Body -->
                            <path d="M82 128 Q100 122 118 128 L122 184 Q100 174 78 184 Z" fill="#152b7a"/>
                            <!-- Blue jacket -->
                            <path d="M80 130 Q66 140,63 163 L77 174 Q100 165,123 174 L137 163 Q134 140,120 130 Q100 120,80 130Z" fill="#0e1f6a"/>
                            <!-- White shirt accent -->
                            <path d="M93 130 Q100 125,107 130 L110 158 Q100 154,90 158Z" fill="white" opacity=".55"/>
                            <!-- Gold buttons -->
                            <circle cx="100" cy="138" r="2" fill="#f0c040" opacity=".8"/>
                            <circle cx="100" cy="148" r="2" fill="#f0c040" opacity=".65"/>
                            <circle cx="100" cy="158" r="2" fill="#f0c040" opacity=".5"/>
                            <!-- Neck -->
                            <ellipse cx="100" cy="118" rx="8" ry="6" fill="#f4c8a0"/>
                            <!-- Head -->
                            <ellipse cx="100" cy="94" rx="27" ry="29" fill="#f4c8a0"/>
                            <!-- Hair base -->
                            <path d="M73 82 Q69 55,78 43 Q90 26,100 24 Q110 26,122 43 Q131 55,127 82" fill="#2654c0"/>
                            <!-- Side hair -->
                            <path d="M73 82 Q64 95,66 114 Q70 124,75 126" fill="#2654c0"/>
                            <path d="M127 82 Q136 95,134 114 Q130 124,125 126" fill="#2654c0"/>
                            <!-- Hair highlight -->
                            <path d="M88 28 Q95 24,102 26" stroke="#5a8af0" stroke-width="2.5" opacity=".6" fill="none" stroke-linecap="round"/>
                            <!-- Hat / beret (Furina) -->
                            <path d="M74 73 Q87 54,100 52 Q113 54,126 73 Q116 68,100 66 Q84 68,74 73Z" fill="#1030a0"/>
                            <ellipse cx="100" cy="73" rx="27" ry="5.5" fill="#1a3ab0"/>
                            <!-- Hat gem -->
                            <path d="M96 55 L100 50 L104 55 L100 58Z" fill="#22d3ee"/>
                            <circle cx="100" cy="55" r="2.5" fill="white" opacity=".8"/>
                            <!-- Hat trim gold -->
                            <path d="M76 73 Q100 68 124 73" stroke="#f0c040" stroke-width="1" opacity=".6" fill="none"/>

                            <!-- Blush -->
                            <ellipse cx="83"  cy="99" rx="7" ry="4" fill="#f08070" opacity=".3"/>
                            <ellipse cx="117" cy="99" rx="7" ry="4" fill="#f08070" opacity=".3"/>
                            <!-- Eyes -->
                            <ellipse cx="88"  cy="95" rx="5"   ry="6"   fill="#5ab0e8"/>
                            <ellipse cx="112" cy="95" rx="5"   ry="6"   fill="#5ab0e8"/>
                            <ellipse cx="88"  cy="95" rx="3"   ry="3.5" fill="#172060"/>
                            <ellipse cx="112" cy="95" rx="3"   ry="3.5" fill="#172060"/>
                            <!-- Eye shine -->
                            <circle cx="89.5" cy="93.5" r="1.5" fill="white" opacity=".95"/>
                            <circle cx="113.5" cy="93.5" r="1.5" fill="white" opacity=".95"/>
                            <!-- Eyebrows -->
                            <path d="M82 87 Q88 84,94 87" stroke="#3a2a1a" stroke-width="1.8" fill="none" stroke-linecap="round"/>
                            <path d="M106 87 Q112 84,118 87" stroke="#3a2a1a" stroke-width="1.8" fill="none" stroke-linecap="round"/>
                            <!-- Mouth -->
                            <path d="M94 107 Q100 112,106 107" stroke="#d06050" stroke-width="1.8" fill="none" stroke-linecap="round"/>

                            <!-- Arms -->
                            <path d="M78 135 Q64 148,59 164" stroke="#0e1f6a" stroke-width="14" stroke-linecap="round"/>
                            <path d="M122 135 Q136 148,141 164" stroke="#0e1f6a" stroke-width="14" stroke-linecap="round"/>
                            <!-- Hands -->
                            <ellipse cx="58"  cy="167" rx="7" ry="5.5" fill="#f4c8a0"/>
                            <ellipse cx="142" cy="167" rx="7" ry="5.5" fill="#f4c8a0"/>

                            <!-- Trident / scepter (Furina weapon) -->
                            <line x1="148" y1="45" x2="143" y2="178" stroke="#22d3ee" stroke-width="2.5" opacity=".85"/>
                            <path d="M139 50 L148 38 L157 50 L148 45Z" fill="#22d3ee" opacity=".95"/>
                            <path d="M143 44 L148 34 L153 44" fill="#67e8f9" opacity=".7"/>
                            <circle cx="148" cy="46" r="5"   fill="#22d3ee" opacity=".5"/>
                            <circle cx="148" cy="46" r="2.5" fill="white" opacity=".9"/>
                            <!-- Trident glow line -->
                            <line x1="148" y1="55" x2="148" y2="80" stroke="#22d3ee" stroke-width="1" opacity=".4" stroke-dasharray="3 4"/>

                            <!-- Water droplets / particles rising -->
                            <circle cx="68"  cy="208" r="3"   fill="#22d3ee" opacity=".55"/>
                            <circle cx="82"  cy="218" r="2"   fill="#67e8f9" opacity=".45"/>
                            <circle cx="100" cy="223" r="2.5" fill="#22d3ee" opacity=".65"/>
                            <circle cx="118" cy="218" r="2"   fill="#67e8f9" opacity=".45"/>
                            <circle cx="132" cy="210" r="3"   fill="#22d3ee" opacity=".55"/>
                            <circle cx="75"  cy="228" r="1.5" fill="#a5f3fc" opacity=".35"/>
                            <circle cx="125" cy="226" r="1.5" fill="#a5f3fc" opacity=".35"/>
                        </svg>

                        {{-- Bottom water glow --}}
                        <div class="absolute bottom-0 inset-x-0 h-20 pointer-events-none"
                             style="background:linear-gradient(0deg,rgba(34,211,238,0.30) 0%,transparent 100%)"></div>
                    </div>
                </div>

                {{-- Floating info badges --}}
                <div class="absolute -top-1 -right-6 card px-3 py-2 text-xs text-cyan-300 flex items-center gap-2 shadow-xl">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    Laravel Developer
                </div>
                <div class="absolute -bottom-3 -left-6 card px-3 py-2 text-xs text-cyan-300 flex items-center gap-2 shadow-xl">
                    <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                    Full Stack
                </div>
                <div class="absolute top-1/2 -left-8 card px-3 py-2 text-xs text-gold-grad flex items-center gap-2 shadow-xl">
                    <span>✨</span> SMKTI PPLG 27
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll arrow --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-blue-300/35 text-xs">
        <span class="tracking-widest text-[10px] uppercase">Scroll</span>
        <div class="scroll-dot w-5 h-8 border border-cyan-400/25 rounded-full flex items-start justify-center pt-1.5">
            <div class="w-1 h-2 bg-cyan-400/60 rounded-full"></div>
        </div>
    </div>
</section>
