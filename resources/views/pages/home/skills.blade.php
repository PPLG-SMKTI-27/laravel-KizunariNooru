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
                
                $techMap = [
                    'laravel' => 'laravel', 'php' => 'php', 'javascript' => 'javascript', 'js' => 'javascript',
                    'vue' => 'vuedotjs', 'react' => 'react', 'tailwind' => 'tailwindcss', 'css' => 'css3',
                    'mysql' => 'mysql', 'node' => 'nodedotjs', 'gsap' => 'gsap', 'alpine' => 'alpinedotjs',
                    'html' => 'html5', 'bootstrap' => 'bootstrap', 'git' => 'git', 'github' => 'github',
                    'python' => 'python', 'docker' => 'docker', 'redis' => 'redis', 'livewire' => 'livewire',
                    'sqlite' => 'sqlite', 'postgresql' => 'postgresql', 'inertia' => 'inertia', 'vite' => 'vite',
                    'blade' => 'laravel', 'sass' => 'sass', 'typescript' => 'typescript', 'ts' => 'typescript',
                    'figma' => 'figma', 'canva' => 'canva', 'framer' => 'framer', 'next' => 'nextdotjs'
                ];

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
                             <div class="flex justify-between items-center mb-3">
                                <div class="flex items-center gap-2">
                                    @php
                                        $sClean = strtolower(trim($s->name));
                                        $sSlug = $techMap[$sClean] ?? null;
                                        // Specific overrides for multi-word
                                        if(!$sSlug) {
                                            if(str_contains($sClean, 'tailwind')) $sSlug = 'tailwindcss';
                                            if(str_contains($sClean, 'alpine')) $sSlug = 'alpinedotjs';
                                        }
                                    @endphp
                                    @if($sSlug)
                                        <img src="https://cdn.simpleicons.org/{{ $sSlug }}/f8fafc" class="w-3.5 h-3.5 brightness-150" alt="">
                                    @endif
                                    <span class="text-slate-300/90 text-[13px] font-bold tracking-tight">{{ $s->name }}</span>
                                </div>
                                <span class="font-cinzel text-cyan-400 text-xs font-bold">{{ $s->percentage }}%</span>
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
                        ['slug'=>'php', 'name'=>'PHP','desc'=>'Backend Core'],
                        ['slug'=>'laravel', 'name'=>'Laravel','desc'=>'Web Framework'],
                        ['slug'=>'mysql', 'name'=>'MySQL','desc'=>'Database'],
                        ['slug'=>'tailwindcss', 'name'=>'Tailwind','desc'=>'Visual Style'],
                        ['slug'=>'alpinedotjs', 'name'=>'Alpine.js','desc'=>'Reactivity'],
                        ['slug'=>'git', 'name'=>'Git','desc'=>'Version Control'],
                        ['slug'=>'github', 'name'=>'GitHub','desc'=>'Collaboration'],
                        ['slug'=>'vuedotjs', 'name'=>'Vue.js','desc'=>'Progressive JS'],
                        ['slug'=>'gsap', 'name'=>'GSAP','desc'=>'Motion Design'],
                    ];
                    @endphp
                    @foreach($techs as $t)
                    <div class="card p-4 text-center group cursor-default relative overflow-hidden">
                        <div class="absolute inset-0 bg-cyan-400/0 group-hover:bg-cyan-400/5 transition-all duration-500"></div>
                        <div class="flex justify-center mb-3">
                            <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center relative group-hover:scale-110 group-hover:border-cyan-400/30 transition duration-500 z-10">
                                <img src="https://cdn.simpleicons.org/{{ $t['slug'] }}/f8fafc" class="w-6 h-6 brightness-150 drop-shadow-[0_0_8px_rgba(255,255,255,0.2)]" alt="">
                            </div>
                        </div>
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
