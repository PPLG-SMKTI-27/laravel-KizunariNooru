<section class="relative py-28 overflow-hidden bg-bg">

    {{-- Liquid Background Blobs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-primary/10 blur-[140px] rounded-full animate-liquid"></div>
        <div class="absolute -bottom-20 -left-20 w-[500px] h-[500px] bg-primary-2/10 blur-[120px] rounded-full animate-liquid" style="animation-delay: -4s"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="gsap-reveal mb-20 text-center lg:text-left flex flex-col lg:flex-row lg:items-end justify-between gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4 justify-center lg:justify-start">
                    <span class="w-8 h-[2px] bg-primary/60 rounded-full"></span>
                    <span class="text-primary font-bold text-[10px] tracking-[0.5em] uppercase">Specialized Systems</span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-text font-cinzel tracking-tight leading-none">
                    Skills & <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">Abilities</span>
                </h2>
            </div>
            <div class="hidden lg:block">
                <div class="bg-surface/30 backdrop-blur-md border border-white/5 rounded-2xl px-6 py-4 text-right shadow-xl">
                    <div class="text-primary font-mono text-[10px] tracking-widest uppercase mb-1">Status: Syncing_Core</div>
                    <div class="w-48 h-1 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-primary animate-[scan_2s_ease-in-out_infinite]" style="width: 60%"></div>
                    </div>
                </div>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 gsap-stagger">
            @foreach($categories as $title => $items)
            <div class="group relative flex flex-col">
                {{-- Card Background with Liquid Glass Effect --}}
                <div class="relative flex-1 bg-surface/20 backdrop-blur-2xl border border-white/10 group-hover:border-primary/40 rounded-[2.5rem] p-8 flex flex-col transition-all duration-500 shadow-2xl overflow-hidden">

                    {{-- Decorative Glow inside card --}}
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-primary/10 blur-[80px] rounded-full group-hover:bg-primary/20 transition-all duration-700"></div>

                    <div class="mb-10 flex items-start justify-between relative z-10">
                        <div>
                            <h3 class="font-bold text-lg text-text tracking-wide mb-1">{{ $title }}</h3>
                            @if($title == 'AI & Robotics')
                                <div class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                    <span class="text-[9px] text-primary/80 font-mono uppercase tracking-[0.2em]">Neural_Link_Active</span>
                                </div>
                            @else
                                <span class="text-[9px] text-muted font-mono uppercase tracking-[0.2em]">Sub_System_{{ $loop->iteration }}</span>
                            @endif
                        </div>

                        {{-- Liquid Icon Container --}}
                        <div class="w-14 h-14 rounded-2xl bg-bg/40 border border-white/5 flex items-center justify-center text-primary shadow-inner group-hover:scale-110 group-hover:text-primary-2 transition-all duration-500">
                            @if($title == 'Backend & Database')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"/></svg>
                            @elseif($title == 'Frontend')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            @elseif($title == 'Software Engineering')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mt-auto relative z-10">
                        @foreach($items as $s)
                        @php
                            $sClean = strtolower(trim($s->name));
                            $sSlug = $techMap[$sClean] ?? null;
                            if(!$sSlug) {
                                if(str_contains($sClean, 'tailwind')) $sSlug = 'tailwindcss';
                                if(str_contains($sClean, 'alpine')) $sSlug = 'alpinedotjs';
                            }
                        @endphp
                        <div class="px-4 py-2 rounded-xl bg-bg/30 border border-white/5 flex items-center gap-3 group/tag hover:bg-primary/10 hover:border-primary/30 transition-all duration-300 shadow-sm">
                            @if($sSlug)
                                <img src="https://cdn.simpleicons.org/{{ $sSlug }}/{{ $title == 'AI & Robotics' ? '6366f1' : '0ea5e9' }}" class="w-4 h-4 opacity-60 group-hover/tag:opacity-100 transition-opacity" alt="">
                            @else
                                <div class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover/tag:bg-primary transition-colors"></div>
                            @endif
                            <span class="text-[11px] font-bold text-text/70 group-hover/tag:text-text transition-colors">{{ $s->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- System Footer Message --}}
        <div class="mt-20 p-6 rounded-[2rem] bg-surface/10 backdrop-blur-xl border border-white/5 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-3 h-3 rounded-full bg-primary animate-ping absolute inset-0 opacity-40"></div>
                    <div class="w-3 h-3 rounded-full bg-primary relative"></div>
                </div>
                <span class="text-xs font-bold text-muted uppercase tracking-[0.3em]">Module Efficiency: <span class="text-text">98.4%</span></span>
            </div>
            <div class="flex gap-4">
                <div class="px-4 py-2 rounded-full bg-white/5 text-[9px] font-mono text-muted uppercase tracking-widest border border-white/5">Protocol_Liquid_Glass</div>
                <div class="px-4 py-2 rounded-full bg-white/5 text-[9px] font-mono text-muted uppercase tracking-widest border border-white/5">AES_256_ENCRYPTED</div>
            </div>
        </div>
    </div>
</section>
