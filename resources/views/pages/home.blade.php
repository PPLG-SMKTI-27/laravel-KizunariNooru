<x-app-layout>

{{-- ══════════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">

    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        {{-- Spline 3D Background - Interactive --}}
        <div class="absolute inset-0 z-0 opacity-40 pointer-events-auto mix-blend-screen">
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
                <span class="text-cyan-400 font-medium">Fontaine</span> — where every line of code flows
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
                @foreach([['value'=>'2','suf'=>'+','label'=>'Years Learning'],['value'=>'10','suf'=>'+','label'=>'Projects'],['value'=>'5','suf'=>'+','label'=>'Technologies']] as $stat)
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


{{-- ══════════════════════════════════════════════════════
     ABOUT SECTION
══════════════════════════════════════════════════════ --}}
<section id="about" class="py-28 relative overflow-hidden">

    {{-- Decorative shapes --}}
    <div class="absolute top-0 right-0 w-96 h-96 pointer-events-none"
         style="background:radial-gradient(circle,rgba(34,211,238,0.06) 0%,transparent 70%)"></div>

    <div class="max-w-6xl mx-auto px-6">

        <div class="gsap-reveal mb-16">
            <span class="section-label">— Unveiling the developer</span>
            <h2 class="section-title text-slate-100">About <span class="text-cyan-grad">Me</span></h2>
            <span class="section-line"></span>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 items-start">

            {{-- Left — Bio --}}
            <div class="lg:col-span-3 space-y-6 gsap-reveal">
                <p class="text-slate-300/90 text-base leading-relaxed">
                    Halo! Saya <span class="text-cyan-400 font-semibold">Fahri Noor Royyan</span>, siswa aktif
                    <span class="text-cyan-400">SMKTI PPLG 27</span> yang passionate dalam dunia
                    <span class="text-slate-100 font-medium">web development</span>. Saya membangun aplikasi web
                    yang elegan, fungsional, dan memberikan pengalaman terbaik bagi pengguna.
                </p>
                <p class="text-blue-100/65 text-base leading-relaxed">
                    Seperti Furina dari Fontaine — saya percaya bahwa sebuah karya tidak hanya harus
                    <em class="text-cyan-200 not-italic">bekerja dengan sempurna</em>, tapi juga harus
                    <em class="text-cyan-200 not-italic">terlihat menawan</em> dan meninggalkan kesan mendalam.
                    Setiap detail penting, setiap animasi bermakna.
                </p>
                <p class="text-blue-100/65 text-base leading-relaxed">
                    Spesialisasi saya: <span class="text-cyan-300 font-medium">Laravel</span> ·
                    <span class="text-cyan-300 font-medium">MySQL</span> ·
                    <span class="text-cyan-300 font-medium">Tailwind CSS</span> ·
                    <span class="text-cyan-300 font-medium">Alpine.js</span> — membangun solusi yang
                    clean, scalable, dan maintainable.
                </p>

                {{-- Tags --}}
                <div class="flex flex-wrap gap-2 pt-2 gsap-stagger">
                    @foreach(['Laravel','PHP','MySQL','Tailwind CSS','JavaScript','Alpine.js','Blade','Git','HTML5','CSS3'] as $t)
                        <span class="tag">{{ $t }}</span>
                    @endforeach
                </div>

                {{-- Furina quote --}}
                <div class="card p-5 border-l-2 border-l-cyan-400/60 rounded-l-none mt-6">
                    <p class="font-playfair text-blue-100/70 italic text-sm leading-relaxed">
                        "The most precise mechanism is useless without the soul to operate it.
                        Code is not just logic — it is art."
                    </p>
                    <p class="text-cyan-400/50 text-xs mt-2 tracking-widest">— Inspired by Furina, Archon of Justice</p>
                </div>
            </div>

            {{-- Right — Stats --}}
            <div class="lg:col-span-2 gsap-stagger">

                {{-- Stat cards --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    @foreach([
                        ['value'=>'2','suf'=>'+','label'=>'Years of Learning','icon'=>'⏳','color'=>'from-cyan-400 to-blue-500'],
                        ['value'=>$projectCount,'suf'=>'+','label'=>'Projects Built','icon'=>'🚀','color'=>'from-gold to-amber-400'],
                        ['value'=>$skills->count(),'suf'=>'+','label'=>'Skills Mastered','icon'=>'⚡','color'=>'from-cyan-400 to-teal-400'],
                        ['value'=>'100','suf'=>'%','label'=>'Passion','icon'=>'💙','color'=>'from-blue-400 to-indigo-500'],
                    ] as $s)
                    <div class="card p-5 text-center group">
                        <div class="text-3xl mb-2 group-hover:scale-125 transition duration-300">{{ $s['icon'] }}</div>
                        <div class="font-cinzel text-2xl font-bold text-cyan-grad mb-0.5">
                            <span data-count="{{ $s['value'] }}" data-suffix="{{ $s['suf'] }}">{{ $s['value'] }}{{ $s['suf'] }}</span>
                        </div>
                        <div class="text-blue-300/50 text-xs">{{ $s['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Info list --}}
                <div class="card p-5 space-y-3">
                    @foreach([
                        ['🎓','School','SMKTI Airlangga PPLG'],
                        ['📍','Location','Indonesia 🇮🇩'],
                        ['💼','Focus','Web Development'],
                        ['🎮','Inspired by','Furina · Genshin Impact'],
                    ] as $info)
                    <div class="flex items-center gap-3 text-sm">
                        <span class="text-base">{{ $info[0] }}</span>
                        <span class="text-blue-300/45 w-20">{{ $info[1] }}</span>
                        <span class="text-blue-100/80 font-medium">{{ $info[2] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════
     RESUME SECTION (Experience & Education)
══════════════════════════════════════════════════════ --}}
<section id="resume" class="py-28 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16">
            
            {{-- Experience --}}
            <div class="space-y-10 gsap-reveal">
                <div>
                    <span class="section-label">— Professional Journey</span>
                    <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Experience</span></h2>
                </div>
                
                <div class="space-y-8 relative border-l border-cyan-500/20 pl-8 ml-4">
                    @foreach([
                        ['year'=>'2023 - Present', 'title'=>'Full Stack Web Developer', 'place'=>'Freelance Projects', 'desc'=>'Mengembangkan berbagai website menggunakan Laravel, MySQL, dan Tailwind CSS untuk klien lokal.'],
                        ['year'=>'2024', 'title'=>'Web Development Intern', 'place'=>'Tech Company', 'desc'=>'Berkontribusi dalam pengembangan modul sistem informasi internal perusahaan berbasis PHP native dan Laravel.']
                    ] as $exp)
                    <div class="relative group">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#020617] shadow-[0_0_10px_rgba(6,182,212,0.4)] border-[3px] border-cyan-500 group-hover:scale-125 transition-transform duration-300"></div>
                        <span class="text-[10px] font-bold text-cyan-500/70 uppercase tracking-widest">{{ $exp['year'] }}</span>
                        <h3 class="text-slate-100 font-semibold mt-1">{{ $exp['title'] }}</h3>
                        <p class="text-cyan-200/50 text-xs mt-1 mb-3">{{ $exp['place'] }}</p>
                        <p class="text-slate-300/70 text-sm leading-relaxed">{{ $exp['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Education --}}
            <div class="space-y-10 gsap-reveal" style="transition-delay: 200ms">
                <div>
                    <span class="section-label">— Academic Background</span>
                    <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Education</span></h2>
                </div>
                
                <div class="space-y-8 relative border-l border-blue-500/20 pl-8 ml-4">
                    @foreach([
                        ['year'=>'2022 - Present', 'title'=>'Pengembangan Perangkat Lunak & GIM', 'place'=>'SMKTI PPLG 27', 'desc'=>'Fokus pada rekayasa perangkat lunak, algoritma, dan pengembangan aplikasi web modern.'],
                        ['year'=>'2019 - 2022', 'title'=>'Junior High School', 'place'=>'Local School', 'desc'=>'Mulai mengenal dasar-dasar pemrograman dan logika komputer.']
                    ] as $edu)
                    <div class="relative group">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#020617] shadow-[0_0_10px_rgba(59,130,246,0.4)] border-[3px] border-blue-500 group-hover:scale-125 transition-transform duration-300"></div>
                        <span class="text-[10px] font-bold text-blue-400/70 uppercase tracking-widest">{{ $edu['year'] }}</span>
                        <h3 class="text-slate-100 font-semibold mt-1">{{ $edu['title'] }}</h3>
                        <p class="text-blue-200/50 text-xs mt-1 mb-3">{{ $edu['place'] }}</p>
                        <p class="text-slate-300/70 text-sm leading-relaxed">{{ $edu['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     SKILLS SECTION
══════════════════════════════════════════════════════ --}}
<section id="skills" class="py-28 relative">

    <div class="absolute inset-0 pointer-events-none"
         style="background:linear-gradient(180deg,transparent,rgba(34,211,238,0.03) 50%,transparent)"></div>

    <div class="max-w-6xl mx-auto px-6">

        <div class="gsap-reveal mb-16 text-center">
            <span class="section-label">— What I can do</span>
            <h2 class="section-title text-slate-100">Skills & <span class="text-cyan-grad">Abilities</span></h2>
            <span class="section-line mx-auto"></span>
        </div>

        <div class="grid lg:grid-cols-2 gap-10">

            {{-- Skill groups --}}
            <div class="space-y-12 gsap-stagger">
                @php
                $groupedSkills = $skills->groupBy('category');
                if($skills->isEmpty()) {
                    $groupedSkills = collect([
                        'Programming' => collect([
                            (object)['name'=>'Laravel', 'percentage'=>85],
                            (object)['name'=>'Tailwind CSS', 'percentage'=>90],
                            (object)['name'=>'MySQL', 'percentage'=>75]
                        ])
                    ]);
                }
                @endphp

                @foreach($groupedSkills as $category => $skillGroup)
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-cyan-400/40 uppercase tracking-[0.2em] ml-2">{{ $category ?: 'General Talents' }}</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($skillGroup as $s)
                        <div class="card p-5 group hover:bg-cyan-400/5 transition-colors overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-1 h-full bg-cyan-500/20 group-hover:bg-cyan-500 transition-colors"></div>
                            <div class="flex justify-between mb-3">
                                <span class="text-slate-300/90 text-sm font-medium">{{ $s->name }}</span>
                                <span class="font-cinzel text-cyan-400 text-sm font-semibold">{{ $s->percentage }}%</span>
                            </div>
                            <div class="skill-track bg-slate-800/20 rounded-full h-1.5 overflow-hidden">
                                <div class="skill-fill h-full bg-gradient-to-r from-cyan-500 to-blue-600 shadow-[0_0_10px_rgba(6,182,212,0.4)] rounded-r-full" data-pct="{{ $s->percentage }}"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Tech icons grid + description --}}
            <div class="space-y-6 gsap-reveal">

                <div class="gsap-stagger grid grid-cols-3 gap-4">
                    @php
                    $techs = [
                        ['icon'=>'🐘','name'=>'PHP','desc'=>'Server side'],
                        ['icon'=>'🎼','name'=>'Laravel','desc'=>'Framework'],
                        ['icon'=>'🗄️','name'=>'MySQL','desc'=>'Database'],
                        ['icon'=>'🌊','name'=>'Tailwind','desc'=>'CSS Framework'],
                        ['icon'=>'⚡','name'=>'Alpine.js','desc'=>'Reactivity'],
                        ['icon'=>'🔧','name'=>'Git','desc'=>'Version Control'],
                        ['icon'=>'🌐','name'=>'Blade','desc'=>'Templating'],
                        ['icon'=>'📱','name'=>'Responsive','desc'=>'Mobile First'],
                        ['icon'=>'🔒','name'=>'Breeze','desc'=>'Auth'],
                    ];
                    @endphp
                    @foreach($techs as $t)
                    <div class="card p-4 text-center group cursor-default">
                        <div class="text-3xl mb-2 group-hover:scale-125 transition duration-300 ease-out">{{ $t['icon'] }}</div>
                        <div class="text-blue-100/90 text-xs font-semibold">{{ $t['name'] }}</div>
                        <div class="text-blue-300/40 text-[10px]">{{ $t['desc'] }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Furina themed panel --}}
                <div class="card p-6" style="background:linear-gradient(135deg,rgba(34,211,238,0.06),rgba(8,145,178,0.04))">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-cyan-400/15 border border-cyan-400/25 flex items-center justify-center text-cyan-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="font-cinzel text-sm text-white font-semibold">Current Focus</h3>
                    </div>
                    <ul class="space-y-2">
                        @foreach(['Building full-stack Laravel applications','Learning GSAP & advanced animations','Creating beautiful UI/UX designs','Exploring API integrations & REST'] as $item)
                        <li class="flex items-center gap-2 text-blue-200/65 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 flex-shrink-0"></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════
     PROJECTS SECTION
══════════════════════════════════════════════════════ --}}
<section id="projects" class="py-28 relative">

    <div class="absolute inset-0 pointer-events-none"
         style="background:radial-gradient(ellipse 80% 50% at 50% 50%,rgba(34,211,238,0.04),transparent)"></div>

    <div class="max-w-6xl mx-auto px-6">

        <div class="gsap-reveal mb-16 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
            <div>
                <span class="section-label">— Portfolio of works</span>
                <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Projects</span></h2>
                <span class="section-line"></span>
            </div>
            <a href="#contact"
               class="inline-flex items-center gap-2 text-sm text-cyan-300/70 hover:text-cyan-200 transition group">
                Hire me for a project
                <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        @if(isset($projects) && $projects->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 gsap-stagger">
            @foreach($projects as $project)
            <div class="card p-6 group">
                <div class="flex justify-between items-start mb-5">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-cyan-400/20 to-blue-600/20 border border-cyan-400/20 flex items-center justify-center text-xl group-hover:scale-110 transition">
                        📁
                    </div>
                    <svg class="w-5 h-5 text-blue-300/30 group-hover:text-cyan-300 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-slate-100 text-lg mb-2 group-hover:text-cyan-400 transition">{{ $project->title }}</h3>
                <p class="text-slate-400/80 text-sm leading-relaxed mb-4 line-clamp-3">{{ $project->description }}</p>
                
                @if($project->tech)
                <div class="flex flex-wrap gap-1.5 mb-6">
                    @foreach(explode(',', $project->tech) as $t)
                        <span class="tag">{{ trim($t) }}</span>
                    @endforeach
                </div>
                @endif

                <div class="flex items-center gap-4 mt-auto">
                    @if($project->github)
                    <a href="{{ $project->github }}" target="_blank" class="text-blue-200/40 hover:text-white transition p-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                    @endif
                    @if($project->demo)
                    <a href="{{ $project->demo }}" target="_blank" class="text-blue-200/40 hover:text-cyan-400 transition p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Default showcase projects --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 gsap-stagger">
            @php
            $defaultProjects = [
                ['icon'=>'🏫','title'=>'Sistem Perizinan Siswa','desc'=>'Aplikasi manajemen izin siswa berbasis Laravel dengan dashboard admin, wali kelas, dan siswa. Fitur auth, CRUD, dan notifikasi.','tags'=>['Laravel','MySQL','Breeze','Tailwind'],'glow'=>'from-cyan-400 to-blue-500'],
                ['icon'=>'🚗','title'=>'Car Rental System','desc'=>'Platform peminjaman kendaraan dengan booking system, admin dashboard lengkap, dan laporan manajemen berbasis Laravel MVC.','tags'=>['Laravel','Blade','MySQL','JS'],'glow'=>'from-blue-400 to-indigo-500'],
                ['icon'=>'💼','title'=>'Portfolio Furina','desc'=>'Portofolio personal dengan tema Furina dari Genshin Impact. Laravel Breeze + GSAP + tsParticles + Tailwind CSS.','tags'=>['Laravel','GSAP','Tailwind','Alpine'],'glow'=>'from-sky-400 to-cyan-500'],
                ['icon'=>'📊','title'=>'Admin Dashboard','desc'=>'Dashboard admin komprehensif dengan manajemen user, statistik, chart analytics, dan dark mode premium.','tags'=>['Laravel','Chart.js','MySQL'],'glow'=>'from-purple-400 to-indigo-500'],
                ['icon'=>'🛒','title'=>'Mini E-Commerce','desc'=>'Toko online sederhana dengan katalog produk, keranjang belanja, sistem checkout, dan panel admin.','tags'=>['Laravel','PHP','MySQL'],'glow'=>'from-teal-400 to-cyan-500'],
                ['icon'=>'📰','title'=>'Blog & CMS','desc'=>'Sistem manajemen konten dengan editor artikel, kategori, tagging, pencarian, dan moderasi komentar.','tags'=>['Laravel','Blade','MySQL'],'glow'=>'from-indigo-400 to-purple-500'],
            ];
            @endphp
            @foreach($defaultProjects as $p)
            <div class="card p-6 group relative overflow-hidden" style="--glow-from:0.05">
                {{-- Top gradient accent --}}
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r {{ $p['glow'] }} opacity-50"></div>

                <div class="flex justify-between items-start mb-5">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $p['glow'] }} opacity-15 border border-white/10 flex items-center justify-center text-2xl relative group-hover:opacity-30 transition">
                        <span class="absolute">{{ $p['icon'] }}</span>
                    </div>
                    <svg class="w-5 h-5 text-blue-300/25 group-hover:text-cyan-300/70 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </div>

                <h3 class="font-semibold text-slate-100 text-base mb-2 group-hover:text-cyan-400 transition">{{ $p['title'] }}</h3>
                <p class="text-slate-400/80 text-sm leading-relaxed mb-5">{{ $p['desc'] }}</p>

                <div class="flex flex-wrap gap-1.5">
                    @foreach($p['tags'] as $t)
                        <span class="tag">{{ $t }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>


{{-- ══════════════════════════════════════════════════════
     SERVICES SECTION
══════════════════════════════════════════════════════ --}}
<section id="services" class="py-28 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="gsap-reveal mb-16 text-center">
            <span class="section-label">— Specialized Solutions</span>
            <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Services</span></h2>
            <span class="section-line mx-auto"></span>
        </div>

        <div class="grid md:grid-cols-3 gap-8 gsap-stagger">
            @foreach([
                ['icon'=>'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 'title'=>'Web Development', 'desc'=>'Membangun website yang cepat, responsif, dan aman menggunakan Laravel dan teknologi modern lainnya.'],
                ['icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 'title'=>'UI/UX Design', 'desc'=>'Mendesain antarmuka pengguna yang estetik dan fungsional dengan fokus pada pengalaman pengguna yang premium.'],
                ['icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title'=>'Web Maintenance', 'desc'=>'Memastikan website tetap berjalan dengan optimal, melakukan update keamanan, dan mengoptimalkan performa.']
            ] as $service)
            <div class="card p-8 group hover:border-cyan-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 mb-6 group-hover:bg-cyan-400/10 group-hover:scale-110 transition duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-100 mb-3">{{ $service['title'] }}</h3>
                <p class="text-slate-400/80 text-sm leading-relaxed">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     CONTACT SECTION
══════════════════════════════════════════════════════ --}}
<section id="contact" class="py-28 relative">

    <div class="absolute inset-0 pointer-events-none"
         style="background:radial-gradient(ellipse 70% 40% at 50% 80%,rgba(34,211,238,0.06),transparent)"></div>

    <div class="max-w-6xl mx-auto px-6">

        <div class="gsap-reveal mb-16 text-center">
            <span class="section-label">— Let's work together</span>
            <h2 class="section-title text-slate-100">Get In <span class="text-cyan-grad">Touch</span></h2>
            <span class="section-line mx-auto"></span>
        </div>

        <div class="max-w-4xl mx-auto grid md:grid-cols-5 gap-8">

            {{-- Contact Info (left) --}}
            <div class="md:col-span-2 space-y-4 gsap-reveal">
                <p class="text-blue-200/60 text-sm leading-relaxed">
                    Punya ide proyek atau pertanyaan? Saya selalu terbuka untuk diskusi dan kolaborasi.
                </p>

                @foreach([
                    ['icon'=>'📧','label'=>'Email','val'=>'24_fahrinoor@student.smkti.net','href'=>'mailto:24_fahrinoor@student.smkti.net'],
                    ['icon'=>'📍','label'=>'Location','val'=>'Indonesia 🇮🇩','href'=>'#'],
                    ['icon'=>'💬','label'=>'Response','val'=>'< 24 hours','href'=>'#'],
                ] as $c)
                <div class="card p-4 flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-cyan-400/10 border border-cyan-400/20 flex items-center justify-center text-lg flex-shrink-0 group-hover:bg-cyan-400/20 transition">
                        {{ $c['icon'] }}
                    </div>
                    <div>
                        <p class="text-cyan-500/50 text-[10px] uppercase tracking-wider">{{ $c['label'] }}</p>
                        <a href="{{ $c['href'] }}" class="text-slate-300 text-sm font-medium hover:text-cyan-400 transition">{{ $c['val'] }}</a>
                    </div>
                </div>
                @endforeach

                {{-- Social icons --}}
                <div class="flex gap-3 pt-2">
                    @foreach([
                        ['title'=>'GitHub','href'=>'#','svg'=>'<path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>'],
                        ['title'=>'LinkedIn','href'=>'#','svg'=>'<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>'],
                        ['title'=>'Instagram','href'=>'#','svg'=>'<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>'],
                    ] as $s)
                    <a href="{{ $s['href'] }}" title="{{ $s['title'] }}"
                       class="w-9 h-9 rounded-lg border border-cyan-400/25 bg-cyan-400/5 flex items-center justify-center text-blue-300/60 hover:text-cyan-300 hover:border-cyan-400/50 hover:bg-cyan-400/10 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">{!! $s['svg'] !!}</svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Contact Form (right) --}}
            <div class="md:col-span-3 gsap-reveal">
                <div class="card p-7">
                    <h3 class="font-cinzel text-lg text-slate-100 mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-5 rounded-full bg-gradient-to-b from-cyan-400 to-blue-500 block"></span>
                        Send a Message
                    </h3>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-blue-300/55 text-xs uppercase tracking-wider mb-2">Your Name</label>
                                <input type="text" name="name" required placeholder="Archon of Fontaine..." class="input-furina">
                            </div>
                            <div>
                                <label class="block text-blue-300/55 text-xs uppercase tracking-wider mb-2">Email</label>
                                <input type="email" name="email" required placeholder="example@fontaine.com" class="input-furina">
                            </div>
                        </div>
                        <div>
                            <label class="block text-blue-300/55 text-xs uppercase tracking-wider mb-2">Subject</label>
                            <input type="text" name="subject" placeholder="Project collaboration..." class="input-furina">
                        </div>
                        <div>
                            <label class="block text-blue-300/55 text-xs uppercase tracking-wider mb-2">Message</label>
                            <textarea name="message" rows="4" required placeholder="Tell me about your project..." class="input-furina resize-none"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Send Message ✨
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GSAP Hero animations --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Typewriter effect
    const texts = ['Laravel Developer', 'Web Developer', 'UI Enthusiast', 'Furina Fan 🌊'];
    let idx = 0, charIdx = 0, deleting = false;
    const typeEl = document.getElementById('typewriter');

    function typeLoop() {
        const current = texts[idx];
        if (!deleting) {
            typeEl.textContent = current.slice(0, ++charIdx);
            if (charIdx === current.length) { deleting = true; setTimeout(typeLoop, 1800); return; }
        } else {
            typeEl.textContent = current.slice(0, --charIdx);
            if (charIdx === 0) { deleting = false; idx = (idx + 1) % texts.length; }
        }
        setTimeout(typeLoop, deleting ? 45 : 80);
    }
    typeLoop();

    // Hero entrance animation
    document.addEventListener('preloaderDone', () => {
        const tl = gsap.timeline({ delay: 0.1 });
        tl.from('#hero-badge', { y: 20, opacity: 0, duration: 0.7, ease: 'power3.out' })
          .from('#hero-title', { y: 60, opacity: 0, duration: 0.9, ease: 'power4.out' }, '-=0.3')
          .from('[id=hero] p, [id=hero] .flex.flex-wrap.gap-4', { y: 30, opacity: 0, duration: 0.8, ease: 'power3.out', stagger: 0.15 }, '-=0.4')
          .from('#hero-art', { x: 60, opacity: 0, duration: 1.2, ease: 'power4.out' }, '-=0.8');

        // Floating animation for hero art
        gsap.to('#hero-art', {
            y: -18,
            duration: 3.5,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        // Skill bars animation
        gsap.utils.toArray('.skill-fill').forEach(bar => {
            gsap.to(bar, {
                width: bar.dataset.pct + '%',
                duration: 1.5,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: bar,
                    start: 'top 90%',
                }
            });
        });
    });
});
</script>
</x-app-layout>