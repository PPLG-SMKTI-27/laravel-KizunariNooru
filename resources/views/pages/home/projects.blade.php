<section id="projects" class="py-20 relative min-h-screen overflow-hidden">

    <style>
        @keyframes scan-horizontal {
            0% { transform: translateY(-100%); opacity: 0; }
            10% { opacity: 0.5; }
            90% { opacity: 0.5; }
            100% { transform: translateY(400%); opacity: 0; }
        }
    </style>

    <div class="absolute inset-0 pointer-events-none z-0">
        <div class="absolute inset-0 bg-linear-to-b from-blue-500/5 via-transparent to-cyan-500/5 opacity-40"></div>
        <div class="absolute inset-0 opacity-[0.03] mix-blend-overlay" style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png');"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(34,211,238,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.1) 1px, transparent 1px); background-size: 60px 60px;"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10 w-full" x-data="{
        activeProject: 0,
        deviceView: 'desktop'
    }">

        <div class="mb-12 border-b border-cyan-500/20 pb-6 relative">
            <div class="absolute -left-4 top-0 w-1 h-full bg-cyan-500/50"></div>
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] font-mono text-cyan-400/60 tracking-[0.4em] uppercase">// PROJECT_DATABASE</span>
                <a href="{{ route('portfolio') }}" class="text-[10px] font-mono text-blue-400 hover:text-cyan-300 uppercase underline decoration-blue-500/30 underline-offset-4 tracking-wider">View Full Project >></a>
            </div>
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight font-cinzel tracking-wider">
                <span class="text-6xl mt-1 text-cyan-400 drop-shadow-[0_0_15px_rgba(34,211,238,0.3)]">D</span>AFTAR <span class="text-transparent bg-clip-text bg-linear-to-r from-emerald-400 to-cyan-500">PROYEK.</span>
            </h2>
            <p class="text-slate-400 text-sm leading-relaxed font-mono border-l-2 border-emerald-500/30 pl-4 italic">
                > Beberapa karya unggulan yang telah dikembangkan.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-6 items-start">
            {{-- Left Side: Active Project Card --}}
            <div class="order-1 lg:order-1 flex flex-col gap-6">
                <div class="relative min-h-[200px] lg:min-h-[200px] grid grid-cols-1">
                    @forelse($projects as $index => $project)
                        <div x-show="activeProject === {{ $index }}"
                            x-transition:enter="transition ease-out duration-500 delay-200 transform"
                            x-transition:enter-start="opacity-0 translate-x-8"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-8"
                            class="col-start-1 row-start-1 bg-[#020814]/60 backdrop-blur-sm border border-cyan-500/20 rounded-2xl p-4 md:p-5 shadow-[0_0_20px_rgba(34,211,238,0.05)] relative overflow-hidden group h-full flex flex-col">

                            <div class="absolute top-0 left-0 w-full h-px bg-linear-to-r from-transparent via-cyan-500/50 to-transparent"></div>

                            {{-- Card Header: Icon & Actions --}}
                            <div class="flex justify-between items-start mb-4 relative z-10">
                                <div class="w-12 h-12 rounded-xl bg-linear-to-br from-cyan-500/20 to-blue-600/10 border border-cyan-500/30 flex items-center justify-center shadow-[0_0_20px_rgba(34,211,238,0.1)] group-hover:shadow-[0_0_30px_rgba(34,211,238,0.2)] transition-all duration-500 overflow-hidden relative">
                                    <div class="absolute inset-0 bg-linear-to-tr from-cyan-400/10 via-transparent to-transparent opacity-50"></div>
                                    <svg class="w-7 h-7 text-cyan-400 transform group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                    </svg>
                                </div>

                                <div class="flex gap-4">
                                    @if($project->github)
                                        <a href="{{ $project->github }}" target="_blank" class="p-2.5 rounded-xl bg-slate-900/50 border border-white/5 text-slate-400 hover:text-white hover:border-cyan-500/30 transition-all duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.1)]">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                        </a>
                                    @endif
                                    @if($project->demo)
                                        <a href="{{ $project->demo }}" target="_blank" class="p-2.5 rounded-xl bg-slate-900/50 border border-white/5 text-slate-400 hover:text-cyan-400 hover:border-cyan-500/30 transition-all duration-300 hover:shadow-[0_0_15px_rgba(34,211,238,0.1)]">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-white mb-3 tracking-tight group-hover:text-cyan-400 transition-colors duration-300">
                                {{ $project->title }}
                            </h3>

                            <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ $project->description }}
                            </p>

                            @if($project->tech)
                                <div class="flex flex-wrap gap-3 mb-5">
                                    @foreach(explode(',', $project->tech) as $t)
                                        <span class="px-4 py-1.5 rounded-full bg-slate-900/80 border border-white/10 hover:border-cyan-500/40 text-[11px] font-bold text-slate-300 uppercase tracking-widest transition-all hover:bg-cyan-950/30 flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 shadow-[0_0_5px_rgba(34,211,238,0.8)]"></span>
                                            {{ trim($t) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-auto pt-6 border-t border-white/5 flex items-center justify-between">
                                <a href="{{ route('portfolio', ['search' => $project->title]) }}"
                                   class="inline-flex items-center gap-3 text-[11px] font-mono font-bold uppercase tracking-[0.3em] text-cyan-400 hover:text-cyan-300 transition-all group/btn">
                                    <span class="relative">
                                        VIEW_ARCHIVE_DATA
                                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-cyan-400 group-hover/btn:w-full transition-all duration-300"></span>
                                    </span>
                                    <span class="group-hover/btn:translate-x-3 transition-transform duration-500 text-lg">››</span>
                                </a>
                                <span class="text-[9px] font-mono text-slate-600 uppercase tracking-widest">// SECURE_ENTRY</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-slate-500 font-mono text-sm">NO_MODULES_FOUND</div>
                    @endforelse
                </div>

                {{-- Navigation Controls --}}
                <div class="flex items-center gap-4 bg-[#020814]/60 backdrop-blur-sm border border-white/5 rounded-xl p-3 w-fit">
                    <button @click="activeProject = activeProject > 0 ? activeProject - 1 : {{ count($projects) - 1 }}"
                        class="p-3 rounded-lg bg-cyan-950/20 border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500/20 transition-all active:scale-95 shadow-[0_0_10px_rgba(34,211,238,0.1)]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>

                    <div class="font-mono text-xs text-slate-500 px-2 tracking-widest">
                        <span class="text-cyan-400" x-text="String(activeProject + 1).padStart(2, '0')"></span>
                        /
                        <span x-text="String({{ count($projects) }}).padStart(2, '0')"></span>
                    </div>

                    <button @click="activeProject = activeProject < {{ count($projects) - 1 }} ? activeProject + 1 : 0"
                        class="p-3 rounded-lg bg-cyan-950/20 border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500/20 transition-all active:scale-95 shadow-[0_0_10px_rgba(34,211,238,0.1)]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            {{-- Right Side: Mockup & Controls --}}
            <div class="order-2 lg:order-2 flex flex-col gap-6">
                <div class="relative w-full rounded-2xl border border-white/10 bg-[#020510]/80 backdrop-blur-xl p-4 lg:p-6 shadow-[0_0_30px_rgba(34,211,238,0.05)]">
                    <div class="flex flex-wrap items-center justify-between mb-6 gap-4 border-b border-white/5 pb-4">
                        <div class="flex gap-1.5 ml-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]/50"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]/50"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]/50"></div>
                        </div>

                        <div class="flex gap-2 bg-[#020814] p-1 rounded-lg border border-cyan-500/20 shadow-inner">
                            <button @click="deviceView = 'desktop'" :class="{'bg-cyan-500/20 text-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.1)]': deviceView === 'desktop', 'text-slate-500 hover:text-slate-300': deviceView !== 'desktop'}" class="p-2 rounded-md transition-all duration-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </button>
                            <button @click="deviceView = 'tablet'" :class="{'bg-cyan-500/20 text-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.1)]': deviceView === 'tablet', 'text-slate-500 hover:text-slate-300': deviceView !== 'tablet'}" class="p-2 rounded-md transition-all duration-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2" ry="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 18h.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                            <button @click="deviceView = 'mobile'" :class="{'bg-cyan-500/20 text-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.1)]': deviceView === 'mobile', 'text-slate-500 hover:text-slate-300': deviceView !== 'mobile'}" class="p-2 rounded-md transition-all duration-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="relative bg-[#050b1a] rounded-lg border border-cyan-500/20 overflow-hidden flex items-center justify-center transition-all duration-500 ease-in-out mx-auto"
                         :class="{
                             'w-full aspect-video': deviceView === 'desktop',
                             'w-full max-w-[340px] aspect-[4/3]': deviceView === 'tablet',
                             'w-full max-w-[200px] aspect-[9/16]': deviceView === 'mobile'
                         }">

                        <div class="absolute inset-0 opacity-[0.05]" style="background-image: linear-gradient(rgba(34,211,238,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.5) 1px, transparent 1px); background-size: 20px 20px;"></div>

                        @foreach($projects as $index => $project)
                            <div x-show="activeProject === {{ $index }}"
                                 x-transition.opacity.duration.500ms
                                 class="absolute inset-0 w-full h-full flex flex-col items-center justify-center bg-[#020612]">

                                <div class="absolute inset-0 pointer-events-none z-20">
                                    <div class="w-full h-1/4 bg-linear-to-b from-transparent via-cyan-400/10 to-transparent border-b border-cyan-400/20 animate-[scan-horizontal_3s_linear_infinite]"></div>
                                </div>

                            <div class="absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden scrollbar-hide z-10 flex flex-col" style="scrollbar-width: none; -ms-overflow-style: none;">
                                {{-- Desktop View --}}
                                <div x-show="deviceView === 'desktop'" class="w-full grow flex flex-col bg-[#020612]">
                                    @if($project->image_desktop)
                                        <img src="{{ asset('storage/' . $project->image_desktop) }}" alt="{{ $project->title }} Desktop" class="w-full h-auto object-top transition-opacity duration-300">
                                    @else
                                        <div class="grow flex flex-col items-center justify-center text-cyan-500/30 gap-3 py-10">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            <span class="font-mono text-xs tracking-[0.2em] uppercase">NO_IMAGE_DATA</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Tablet View --}}
                                <div x-show="deviceView === 'tablet'" class="w-full grow flex flex-col bg-[#020612]">
                                    @if($project->image_tablet)
                                        <img src="{{ asset('storage/' . $project->image_tablet) }}" alt="{{ $project->title }} Tablet" class="w-full h-auto object-top transition-opacity duration-300">
                                    @else
                                        <div class="grow flex flex-col items-center justify-center text-cyan-500/30 gap-2 py-10">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            <span class="font-mono text-[10px] tracking-[0.2em] uppercase">NO_IMAGE_DATA</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Mobile View --}}
                                <div x-show="deviceView === 'mobile'" class="w-full grow flex flex-col bg-[#020612]">
                                    @if($project->image_mobile)
                                        <img src="{{ asset('storage/' . $project->image_mobile) }}" alt="{{ $project->title }} Mobile" class="w-full h-auto object-top transition-opacity duration-300">
                                    @else
                                        <div class="grow flex flex-col items-center justify-center text-cyan-500/30 gap-2 py-10">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            <span class="font-mono text-[8px] tracking-[0.2em] text-center uppercase">NO_IMG</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
