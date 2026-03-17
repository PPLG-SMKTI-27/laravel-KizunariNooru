<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-20 overflow-hidden">
        <div class="absolute inset-0 z-0" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(34,211,238,0.1) 41px, transparent 42px); background-size: 100% 100%;"></div>
        <div class="absolute inset-0 z-0 opacity-10" style="background-image: linear-gradient(rgba(34,211,238,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.5) 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="gsap-reveal mb-16 text-center lg:text-left flex flex-col lg:flex-row lg:items-end justify-between gap-6">
            <div>
                <span class="text-cyan-400 font-mono text-sm tracking-widest uppercase mb-2 block">— Specialized Systems</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-100">Skills & <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Abilities</span></h2>
            </div>
            <div class="text-blue-300/40 text-[10px] font-mono tracking-widest hidden lg:block uppercase text-right">
                SCANNING_MODULES... OK<br>
                SYSTEMS_READY... 100%
            </div>
        </div>

        @php
        $techMap = [
            'laravel' => 'laravel', 'php' => 'php', 'javascript' => 'javascript', 'js' => 'javascript',
            'vue' => 'vuedotjs', 'react' => 'react', 'tailwind' => 'tailwindcss', 'css' => 'css3',
            'mysql' => 'mysql', 'node' => 'nodedotjs', 'gsap' => 'gsap', 'alpine' => 'alpinedotjs',
            'html' => 'html5', 'bootstrap' => 'bootstrap', 'git' => 'git', 'github' => 'github',
            'python' => 'python', 'docker' => 'docker', 'redis' => 'redis', 'livewire' => 'livewire',
            'sqlite' => 'sqlite', 'postgresql' => 'postgresql', 'inertia' => 'inertia', 'vite' => 'vite',
            'figma' => 'figma', 'canva' => 'canva', 'framer' => 'framer', 'next' => 'nextdotjs',
            'typescript' => 'typescript', 'ts' => 'typescript'
        ];

        $categories = [
            'Backend & Database' => [],
            'Frontend' => [],
            'Tools' => []
        ];

        $backendKeywords = ['laravel', 'php', 'mysql', 'node', 'python', 'docker', 'redis', 'sqlite', 'postgresql', 'api', 'database', 'sql'];
        $frontendKeywords = ['tailwind', 'css', 'js', 'javascript', 'vue', 'react', 'alpine', 'gsap', 'html', 'bootstrap', 'typescript', 'ts', 'inertia', 'livewire', 'vite', 'sass', 'next'];

        foreach($skills as $skill) {
            $name = strtolower($skill->name);
            $found = false;

            foreach($backendKeywords as $key) {
                if(str_contains($name, $key)) {
                    $categories['Backend & Database'][] = $skill;
                    $found = true;
                    break;
                }
            }

            if(!$found) {
                foreach($frontendKeywords as $key) {
                    if(str_contains($name, $key)) {
                        $categories['Frontend'][] = $skill;
                        $found = true;
                        break;
                    }
                }
            }

            if(!$found) {
                $categories['Tools'][] = $skill;
            }
        }

        $categories['Software Engineering'] = [
            (object)['name' => 'Problem Solving'],
            (object)['name' => 'Clean Code'],
            (object)['name' => 'System Design'],
            (object)['name' => 'Debugging']
        ];

        $categories['AI & Robotics'] = [
            (object)['name' => 'Python'],
            (object)['name' => 'Machine Learning'],
            (object)['name' => 'Automation'],
            (object)['name' => 'IoT Systems']
        ];

        if($skills->isEmpty()) {
            $categories['Backend & Database'] = [
                (object)['name' => 'Laravel'], (object)['name' => 'PHP'], (object)['name' => 'MySQL']
            ];
            $categories['Frontend'] = [
                (object)['name' => 'Tailwind CSS'], (object)['name' => 'Alpine.js'], (object)['name' => 'GSAP']
            ];
            $categories['Tools'] = [
                (object)['name' => 'Git'], (object)['name' => 'GitHub'], (object)['name' => 'Gemini'], (object)['name' => 'Antigravity'], (object)['name' => 'Claude code']
            ];
        }
        @endphp

        <div class="flex flex-wrap justify-center gap-6 gsap-stagger">
            @foreach($categories as $title => $items)
            <div class="w-full md:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)] group relative flex flex-col">
                <div class="absolute -inset-px bg-gradient-to-b from-cyan-500/40 via-blue-600/20 to-transparent rounded-2xl blur-sm opacity-30 group-hover:opacity-100 transition duration-500"></div>

                <div class="relative flex-1 bg-[#020814]/90 backdrop-blur-xl border border-cyan-500/10 hover:border-cyan-400/30 rounded-2xl p-6 flex flex-col transition-colors duration-300">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h3 class="font-mono text-sm font-bold text-white tracking-widest uppercase">{{ $title }}</h3>
                            @if($title == 'AI & Robotics')
                                <span class="text-[9px] text-cyan-400/80 font-mono uppercase tracking-widest block mt-1 animate-pulse">Bio-Matrix Active</span>
                            @endif
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-cyan-950/50 border border-cyan-500/20 flex items-center justify-center shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover:shadow-[0_0_20px_rgba(34,211,238,0.3)] transition-shadow">
                            @if($title == 'Backend & Database')
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"/></svg>
                            @elseif($title == 'Frontend')
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            @elseif($title == 'Software Engineering')
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            @elseif($title == 'AI & Robotics')
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                            @else
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mt-auto">
                        @foreach($items as $s)
                        @php
                            $sClean = strtolower(trim($s->name));
                            $sSlug = $techMap[$sClean] ?? null;
                            if(!$sSlug) {
                                if(str_contains($sClean, 'tailwind')) $sSlug = 'tailwindcss';
                                if(str_contains($sClean, 'alpine')) $sSlug = 'alpinedotjs';
                            }
                        @endphp
                        <div class="px-3 py-1.5 rounded-md bg-cyan-950/30 border border-cyan-500/10 flex items-center gap-2 group/tag hover:border-cyan-400/50 hover:bg-cyan-900/40 hover:shadow-[0_0_10px_rgba(34,211,238,0.2)] transition duration-300">
                            @if($sSlug)
                                <img src="https://cdn.simpleicons.org/{{ $sSlug }}/22d3ee" class="w-3.5 h-3.5 opacity-70 group-hover/tag:opacity-100 group-hover/tag:scale-110 transition-all" alt="">
                            @endif
                            <span class="text-xs font-mono text-cyan-100/70 group-hover/tag:text-cyan-300 transition-colors">{{ $s->name }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="absolute top-0 right-0 p-2 opacity-30 group-hover:opacity-100 transition-opacity">
                        <div class="w-3 h-3 border-t-2 border-r-2 border-cyan-400"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 p-2 opacity-30 group-hover:opacity-100 transition-opacity">
                        <div class="w-3 h-3 border-b-2 border-l-2 border-cyan-400"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-14 p-4 rounded-xl border border-cyan-500/20 bg-cyan-950/20 backdrop-blur-md flex items-center justify-between gap-4 gsap-reveal shadow-[0_0_20px_rgba(34,211,238,0.05)]">
            <div class="flex items-center gap-3">
                <div class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_8px_rgba(34,211,238,0.8)]"></div>
                <span class="text-xs font-mono text-cyan-300/80 tracking-widest uppercase">System Core Status: Optimal</span>
            </div>
            <div class="hidden sm:flex gap-6">
                <div class="text-[10px] font-mono text-cyan-500/40 uppercase tracking-wider">Protocol_Alpha_Active</div>
                <div class="text-[10px] font-mono text-cyan-500/40 uppercase tracking-wider">Matrix_Sync_Stable</div>
            </div>
        </div>
    </div>
</section>
