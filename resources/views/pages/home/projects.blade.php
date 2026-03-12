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
            <div class="flex flex-wrap items-center gap-4">
                <a href="#contact"
                   class="inline-flex items-center gap-2 text-sm text-cyan-300/70 hover:text-cyan-200 transition group border-r border-cyan-400/20 pr-4 h-5">
                    Hire me for a project
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
                <a href="{{ route('portfolio') }}"
                   class="inline-flex items-center gap-2 text-sm text-white/80 hover:text-cyan-400 transition group font-semibold uppercase tracking-widest text-[10px]">
                    View archives 🗃️
                </a>
            </div>
        </div>

        @if(isset($projects) && count($projects) > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 gsap-stagger">
            @php
                $glows = [
                    'from-cyan-400 to-blue-500',
                    'from-blue-400 to-indigo-500',
                    'from-sky-400 to-cyan-500',
                    'from-purple-400 to-indigo-500',
                    'from-teal-400 to-cyan-500',
                    'from-indigo-400 to-purple-500'
                ];
                
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
            @endphp
            @foreach($projects as $index => $project)
            @php
                $glow = $glows[$index % count($glows)];
                $firstTech = explode(',', $project->tech)[0] ?? null;
                $slug = $firstTech ? ($techMap[strtolower(trim($firstTech))] ?? null) : null;
            @endphp
            <div class="card p-6 group relative overflow-hidden flex flex-col h-full" style="--glow-from:0.05">
                {{-- Top gradient accent --}}
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r {{ $glow }} opacity-50"></div>
                
                <div class="flex justify-between items-start mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br {{ $glow }} opacity-30 border border-white/20 flex items-center justify-center relative group-hover:scale-110 group-hover:opacity-50 transition duration-500 z-10 overflow-hidden shadow-lg shadow-cyan-900/20">
                        <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        @if($slug)
                            <img src="https://cdn.simpleicons.org/{{ $slug }}/f8fafc" class="w-6 h-6 relative z-10 brightness-150 drop-shadow-[0_0_8px_rgba(255,255,255,0.3)]" alt="">
                        @else
                            <svg class="w-6 h-6 text-white absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="flex gap-2 relative z-10">
                        @if($project->github)
                        <a href="{{ $project->github }}" target="_blank" class="p-2 text-blue-200/30 hover:text-white hover:bg-white/5 rounded-lg transition" title="Source Code">
                            <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </a>
                        @endif
                        @if($project->demo)
                        <a href="{{ $project->demo }}" target="_blank" class="p-2 text-blue-200/30 hover:text-cyan-400 hover:bg-cyan-400/5 rounded-lg transition" title="Live Preview">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>

                <h3 class="font-black text-white text-base mb-2 group-hover:text-cyan-400 transition relative z-10 tracking-tight">{{ $project->title }}</h3>
                <p class="text-slate-400/80 text-[13px] leading-relaxed mb-5 line-clamp-3 relative z-10 font-medium">{{ $project->description }}</p>
                
                @if($project->tech)
                <div class="flex flex-wrap gap-2 mt-auto relative z-10">
                    @foreach(explode(',', $project->tech) as $t)
                        @php 
                            $tClean = strtolower(trim($t));
                            $tSlug = $techMap[$tClean] ?? null;
                        @endphp
                        <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-lg bg-white/5 border border-white/5 hover:border-cyan-400/30 transition duration-300">
                            @if($tSlug)
                                <img src="https://cdn.simpleicons.org/{{ $tSlug }}/06b6d4" class="w-2.5 h-2.5 opacity-70 group-hover:opacity-100 transition" alt="">
                            @endif
                            <span class="text-[9px] font-bold text-slate-300 group-hover:text-cyan-300 transition uppercase tracking-tighter">{{ trim($t) }}</span>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-10">
            <p class="text-slate-400/80 text-sm">Belum ada proyek yang ditambahkan.</p>
        </div>
        @endif
    </div>
</section>
