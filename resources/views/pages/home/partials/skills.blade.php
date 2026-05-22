<section class="relative py-28 overflow-hidden bg-bg">

    {{-- Liquid Background Blobs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-primary/8 blur-[140px] rounded-full animate-liquid"></div>
        <div class="absolute -bottom-20 -left-20 w-[500px] h-[500px] bg-primary-2/8 blur-[120px] rounded-full animate-liquid" style="animation-delay: -4s"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="gsap-reveal mb-20 text-center lg:text-left flex flex-col lg:flex-row lg:items-end justify-between gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4 justify-center lg:justify-start">
                    <span class="w-8 h-[2px] bg-primary/60 rounded-full"></span>
                    <span class="text-primary font-bold text-[10px] tracking-[0.5em] uppercase">{{ __('Specialized Systems') }}</span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-text font-display tracking-tight leading-none">
                    {{ __('Skills') }} & <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">{{ __('Learning') }}</span>
                </h2>
            </div>
            <div class="hidden lg:block">
                <div class="bg-surface/30 backdrop-blur-md border border-white/5 rounded-2xl px-6 py-4 text-right shadow-xl">
                    <div class="text-primary font-mono text-[10px] tracking-widest uppercase mb-1">{{ __('Status') }}: Syncing_Core</div>
                    <div class="w-48 h-1 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-primary animate-[scan_2s_ease-in-out_infinite]" style="width: 60%"></div>
                    </div>
                </div>
            </div>
        </div>

        @php
    // Mapping for simple icons (SimpleIcons CDN)
    $techMap = [
        'laravel' => 'laravel', 'php' => 'php', 'javascript' => 'javascript', 'js' => 'javascript',
        'vue' => 'vuedotjs', 'react' => 'react', 'react.js' => 'react', 'tailwind' => 'tailwindcss',
        'tailwind css' => 'tailwindcss', 'css' => 'css3', 'html' => 'html5',
        'mysql' => 'mysql', 'node' => 'nodedotjs', 'gsap' => 'gsap', 'alpine' => 'alpinedotjs',
        'bootstrap' => 'bootstrap', 'git' => 'git', 'github' => 'github',
        'python' => 'python', 'docker' => 'docker', 'redis' => 'redis', 'livewire' => 'livewire',
        'sqlite' => 'sqlite', 'postgresql' => 'postgresql', 'inertia' => 'inertia', 'vite' => 'vite',
        'figma' => 'figma', 'canva' => 'canva', 'framer' => 'framer', 'next' => 'nextdotjs',
        'typescript' => 'typescript', 'ts' => 'typescript'
    ];

    $categories = [
    'Backend & Database' => [],
    'Frontend' => [],
    'Tools' => [],
    'AI & Technology' => [],
    'Software Engineering' => [],
];

    $backendKeywords = ['laravel','php','mysql','node','python','docker','redis','sqlite','postgresql','api','database','sql'];
    $frontendKeywords = ['tailwind','css','js','javascript','vue','react','alpine','gsap','html','bootstrap','typescript','ts','inertia','livewire','vite','sass','next'];
    $softwareEngKeywords = ['clean code','system design','debugging','problem solving','software engineering','architecture','team collaboration'];
    $aiTechKeywords = ['ai','artificial intelligence','prompt engineering','ai tools','machine learning','deep learning','nlp','computer vision'];

    foreach($skills as $skill) {
        $name = strtolower($skill->name);
        $category = $skill->category ?? '';
        $added = false;
        
        // Use explicit category if it matches one of our sections
        if (stripos($category, 'backend') !== false) {
            $categories['Backend & Database'][] = $skill;
            $added = true;
        } elseif (stripos($category, 'frontend') !== false) {
            $categories['Frontend'][] = $skill;
            $added = true;
        } elseif (stripos($category, 'ai & technology') !== false || stripos($category, 'ai') !== false || stripos($category, 'technology') !== false) {
            $categories['AI & Technology'][] = $skill;
            $added = true;
        } elseif (stripos($category, 'software engineering') !== false || stripos($category, 'software') !== false) {
            $categories['Software Engineering'][] = $skill;
            $added = true;
        }
        if ($added) continue;

        // Fallback keyword matching
        foreach($backendKeywords as $kw) {
            if(str_contains($name, $kw)) {
                $categories['Backend & Database'][] = $skill;
                $added = true;
                break;
            }
        }
        if($added) continue;
        foreach($frontendKeywords as $kw) {
            if(str_contains($name, $kw)) {
                $categories['Frontend'][] = $skill;
                $added = true;
                break;
            }
        }
        if($added) continue;
        foreach($softwareEngKeywords as $kw) {
            if(str_contains($name, $kw)) {
                $categories['Software Engineering'][] = $skill;
                $added = true;
                break;
            }
        }
        if($added) continue;
        // AI & Technology detection
        foreach($aiTechKeywords as $kw) {
            if(str_contains($name, $kw)) {
                $categories['AI & Technology'][] = $skill;
                $added = true;
                break;
            }
        }
        if($added) continue;
        // Default to Tools
        $categories['Tools'][] = $skill;
    }

    // Fallback for an empty skills collection – show representative examples
    if(empty($skills)) {
        $categories['Backend & Database'] = [
            (object)['name' => 'Laravel'],
            (object)['name' => 'PHP'],
            (object)['name' => 'MySQL']
        ];
        $categories['Frontend'] = [
            (object)['name' => 'HTML'],
            (object)['name' => 'CSS'],
            (object)['name' => 'JavaScript'],
            (object)['name' => 'React.js'],
            (object)['name' => 'Tailwind CSS']
        ];
        $categories['Tools'] = [
            (object)['name' => 'Git'],
            (object)['name' => 'GitHub'],
            (object)['name' => 'Antigravity']
        ];
        $categories['AI & Technology'] = [
            (object)['name' => 'Prompt Engineering'],
            (object)['name' => 'AI Tools Usage']
        ];
        $categories['Software Engineering'] = [
            (object)['name' => 'Problem Solving'],
            (object)['name' => 'Team Collaboration']
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
                            <h3 class="font-bold text-lg text-text tracking-wide mb-1">{{ __($title) }}</h3>
                            @if($title == 'AI & Technology')
                                <div class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                    <span class="text-[9px] text-primary/80 font-mono uppercase tracking-[0.2em]">AI_Link_Active</span>
                                </div>
                            @else
                                <span class="text-[9px] text-muted font-mono uppercase tracking-[0.2em]">{{ __('Sub_System') }}_{{ $loop->iteration }}</span>
                            @endif
                        </div>

                        {{-- Liquid Icon Container --}}
                        <div class="w-14 h-14 rounded-2xl bg-bg/40 border border-white/5 flex items-center justify-center text-primary shadow-inner group-hover:scale-110 group-hover:text-primary-2 transition-all duration-500">
                            @if($title == 'Backend & Database')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"/></svg>
                            @elseif($title == 'Frontend')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            @elseif($title == 'Tools')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @elseif($title == 'AI & Technology')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
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
                                <img src="https://cdn.simpleicons.org/{{ $sSlug }}/{{ $title == 'AI & Technology' ? '6366f1' : '0ea5e9' }}" class="w-4 h-4 opacity-60 group-hover/tag:opacity-100 transition-opacity" alt="">
                            @else
                                <div class="w-1.5 h-1.5 rounded-full bg-primary/40 group-hover/tag:bg-primary transition-colors"></div>
                            @endif
                            <span class="text-[11px] font-bold text-text/70 group-hover/tag:text-text transition-colors">{{ __($s->name) }}</span>
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
                <span class="text-xs font-bold text-muted uppercase tracking-[0.3em]">{{ __('Module Efficiency') }}: <span class="text-text">98.4%</span></span>
            </div>
            <div class="flex gap-4">
                <div class="px-4 py-2 rounded-full bg-white/5 text-[9px] font-mono text-muted uppercase tracking-widest border border-white/5">Protocol_Liquid_Glass</div>
                <div class="px-4 py-2 rounded-full bg-white/5 text-[9px] font-mono text-muted uppercase tracking-widest border border-white/5">AES_256_ENCRYPTED</div>
            </div>
        </div>
    </div>
</section>
