{{-- ══════════════════════════════════════════════════════
     PROJECTS SECTION — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<section id="projects" class="py-28 relative min-h-screen overflow-hidden bg-bg"
    x-data="{
        activeProject: 0,
        deviceView: 'desktop',
        projectCount: {{ count($projects) }},
        scrollInterval: null,
        startScroll() {
            this.stopScroll();
            if (this.projectCount > 1) {
                this.scrollInterval = setInterval(() => { this.next(); }, 6000);
            }
        },
        stopScroll() { if (this.scrollInterval) clearInterval(this.scrollInterval); },
        next() { this.activeProject = (this.activeProject + 1) % this.projectCount; },
        prev() { this.activeProject = (this.activeProject - 1 + this.projectCount) % this.projectCount; }
    }"
    x-init="startScroll()" @mouseenter="stopScroll()" @mouseleave="startScroll()">

    {{-- Liquid Background Elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-primary/8 blur-[120px] rounded-full animate-liquid"></div>
        <div class="absolute bottom-1/4 -right-20 w-[400px] h-[400px] bg-primary-2/8 blur-[100px] rounded-full animate-liquid" style="animation-delay: -3s"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="mb-16 gsap-reveal">
            <div class="flex items-center gap-4 mb-4">
                <span class="h-px w-12 bg-primary/50"></span>
                <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-primary">{{ __('Selected Works') }}</span>
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-text font-display tracking-tight">
                {{ __('Featured') }} <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic px-2">{{ __('Projects') }}</span>
            </h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-10 items-start">

            {{-- Left Side: Info Glass Card (Col 1-5) --}}
            <div class="lg:col-span-5 flex flex-col gap-8">
                <div class="relative min-h-[380px]">
                    @foreach($projects as $index => $project)
                    <div x-show="activeProject === {{ $index }}"
                         x-transition:enter="transition ease-out duration-700 transform"
                         x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-90"
                         class="bg-surface/30 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-8 shadow-2xl overflow-hidden group transform-gpu"
                         data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.5">

                        {{-- Floating Glow --}}
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/20 blur-3xl rounded-full group-hover:bg-primary/40 transition-colors"></div>

                        <div class="relative z-10">
                            <div class="flex justify-between items-center mb-8">
                                <div class="w-14 h-14 rounded-2xl bg-bg/50 border border-border flex items-center justify-center text-primary shadow-inner">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                    </svg>
                                </div>
                                <div class="flex gap-3">
                                    @if($project->github)
                                    <a href="{{ $project->github }}" target="_blank" aria-label="Lihat Source Code di GitHub" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-muted hover:text-primary hover:border-primary/50 transition-all">
                                        <x-icons.github class="w-5 h-5" />
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <h3 class="text-3xl font-bold text-text mb-4 leading-tight">{{ __($project->title) }}</h3>
                            <p class="text-muted leading-relaxed mb-8 line-clamp-4 font-light">{{ __($project->description) }}</p>

                            <div class="flex flex-wrap gap-2 mb-8">
                                @foreach($project->tech_array as $t)
                                <span class="px-4 py-1.5 rounded-xl bg-primary/5 border border-primary/10 text-[10px] font-bold text-primary/80 uppercase tracking-widest">
                                    {{ __($t) }}
                                </span>
                                @endforeach
                            </div>

                            <a href="{{ route('public.projects.show', $project) }}" class="inline-flex items-center justify-center gap-3 px-8 py-4 mt-2 rounded-[1.25rem] bg-gradient-to-r from-primary to-primary-2 text-white text-[11px] font-bold uppercase tracking-[0.2em] shadow-lg hover:shadow-primary/30 hover:-translate-y-1 transition-all group/btn">
                                {{ __('View Project Details') }} 
                                <span class="bg-white/20 rounded-full p-1 group-hover/btn:translate-x-1 transition-transform">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Custom Liquid Pagination --}}
                <div class="flex items-center gap-6 px-4">
                    <div class="flex gap-2">
                        <button @click="prev(); stopScroll();" class="w-12 h-12 rounded-2xl bg-surface border border-border flex items-center justify-center text-muted hover:bg-primary hover:text-white transition-all shadow-lg active:scale-90">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="next(); stopScroll();" class="w-12 h-12 rounded-2xl bg-surface border border-border flex items-center justify-center text-muted hover:bg-primary hover:text-white transition-all shadow-lg active:scale-90">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                    <div class="h-px grow bg-border relative">
                        <div class="absolute top-0 left-0 h-full bg-primary transition-all duration-500" :style="`width: ${((activeProject + 1) / projectCount) * 100}%` "></div>
                    </div>
                    <span class="font-mono text-xs text-muted font-bold" x-text="`${activeProject + 1}/${projectCount}`"></span>
                </div>
            </div>

            {{-- Right Side: Mockup Display (Col 6-12) --}}
            <div class="lg:col-span-7">
                <div data-tilt data-tilt-max="8" data-tilt-speed="400" data-tilt-perspective="1000" class="p-4 rounded-[3rem] bg-surface/40 backdrop-blur-3xl border border-white/10 shadow-2xl relative transform-gpu">
                    {{-- Device Controls --}}
                    <div class="flex justify-center gap-4 mb-6">
                        @foreach(['desktop' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'tablet' => 'M4 2h16v20H4z', 'mobile' => 'M7 2h10v20H7z'] as $view => $path)
                        <button @click="deviceView = '{{ $view }}'; stopScroll();"
                            :class="deviceView === '{{ $view }}' ? 'bg-primary text-white scale-110 shadow-primary/30' : 'bg-bg/50 text-muted'"
                            class="w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-500 shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/></svg>
                        </button>
                        @endforeach
                    </div>

                    {{-- Screen Container --}}
                    <div class="relative bg-bg rounded-[2rem] overflow-hidden transition-all duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] shadow-inner mx-auto"
                         :class="{
                             'w-full aspect-video': deviceView === 'desktop',
                             'w-[70%] aspect-[3/4]': deviceView === 'tablet',
                             'w-[45%] aspect-[9/19]': deviceView === 'mobile'
                         }">

                        {{-- Scanning Liquid Effect --}}
                        <div class="absolute inset-0 pointer-events-none z-20">
                            <div class="w-full h-1/2 bg-gradient-to-b from-primary/20 to-transparent opacity-30 animate-scan"></div>
                        </div>

                        @foreach($projects as $index => $project)
                        <div x-show="activeProject === {{ $index }}" x-transition.opacity.duration.800ms class="absolute inset-0 w-full h-full">
                            <div class="w-full h-full overflow-y-auto scrollbar-hide">
                                @php
                                    $imageKey = "image_" . '$deviceView'; // Not possible in PHP, but logic-wise:
                                @endphp
                                <template x-if="deviceView === 'desktop'">
                                    <img src="{{ asset('storage/' . $project->image_desktop) }}" 
                                         class="w-full h-auto" 
                                         alt="{{ $project->title }} — Desktop View"
                                         loading="lazy">
                                </template>
                                <template x-if="deviceView === 'tablet'">
                                    <img src="{{ asset('storage/' . $project->image_tablet) }}" 
                                         class="w-full h-auto" 
                                         alt="{{ $project->title }} — Tablet View"
                                         loading="lazy">
                                </template>
                                <template x-if="deviceView === 'mobile'">
                                    <img src="{{ asset('storage/' . $project->image_mobile) }}" 
                                         class="w-full h-auto" 
                                         alt="{{ $project->title }} — Mobile View"
                                         loading="lazy">
                                </template>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- View All Projects CTA --}}
        <div class="mt-20 flex justify-center gsap-reveal">
            <a href="{{ route('public.projects.index') }}" class="group/allbtn relative inline-flex items-center justify-center px-10 py-5 rounded-full bg-surface/50 border border-primary/30 text-text font-bold text-xs uppercase tracking-widest backdrop-blur-md overflow-hidden transition-all hover:border-primary hover:shadow-[0_0_30px_rgba(59,130,246,0.3)]">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-primary-2/10 translate-y-full group-hover/allbtn:translate-y-0 transition-transform duration-500 ease-out"></div>
                <span class="relative z-10 flex items-center gap-3">
                    {{ __('Explore Full Portfolio') }}
                    <svg class="w-4 h-4 group-hover/allbtn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </a>
        </div>
    </div>
</section>
