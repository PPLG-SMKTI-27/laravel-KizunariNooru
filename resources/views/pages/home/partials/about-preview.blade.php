{{-- ══════════════════════════════════════════════════════
     ABOUT SECTION — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<section id="about" class="py-32 relative overflow-hidden bg-bg transition-colors duration-700">

    {{-- Background Fluid Elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/8 blur-[120px] rounded-full animate-liquid"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-2/5 blur-[100px] rounded-full animate-liquid" style="animation-delay: -4s"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="gsap-reveal mb-16 text-center lg:text-left">
            <span class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-[10px] font-bold uppercase tracking-[0.3em] mb-4">
                {{ __('The Developer') }}
            </span>
            <h2 class="font-cinzel text-4xl md:text-5xl font-black text-text">
                {{ __('About') }} <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">{{ __('Me') }}</span>
            </h2>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 items-center">

            {{-- Content Column --}}
            <div class="lg:col-span-3 space-y-8 gsap-reveal">
                {{-- Single Paragraph Content (3 Sentences Max) --}}
                <p class="text-lg md:text-xl text-muted leading-relaxed font-light mt-2">
                    {!! __('about_paragraph') !!}
                </p>

                {{-- Skill Tags Liquid --}}
                <div class="flex flex-wrap gap-2 pt-4">
                    @foreach(['Laravel','PHP','MySQL','Tailwind','Alpine.js','Git'] as $t)
                        <span class="px-4 py-1.5 rounded-xl bg-surface/40 backdrop-blur-md border border-border text-[11px] font-bold text-muted hover:border-primary/50 hover:text-primary transition-all duration-300">
                            {{ $t }}
                        </span>
                    @endforeach
                </div>

                {{-- Skill Progress Bars --}}
                <div class="p-6 rounded-[2rem] bg-surface/30 backdrop-blur-xl border border-white/10 shadow-xl space-y-4">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-text mb-4">{{ __('Core Expertise') }}</h3>
                    @foreach([
                        ['name' => 'Laravel Ecosystem', 'pct' => 90],
                        ['name' => 'PHP', 'pct' => 85],
                        ['name' => 'Tailwind CSS', 'pct' => 85],
                        ['name' => 'MySQL', 'pct' => 80],
                        ['name' => 'Alpine.js', 'pct' => 75]
                    ] as $skill)
                    <div>
                        <div class="flex justify-between text-[11px] font-bold uppercase mb-2">
                            <span class="text-text">{{ $skill['name'] }}</span>
                            <span class="text-primary">{{ $skill['pct'] }}%</span>
                        </div>
                        <div class="h-1.5 w-full bg-border rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-primary to-primary-2 rounded-full skill-fill" data-pct="{{ $skill['pct'] }}" style="width: 0%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Info & Stats Column --}}
            <div class="lg:col-span-2 space-y-6 gsap-stagger">

                {{-- Glass Info Card --}}
                <div class="p-8 rounded-[2.5rem] bg-surface/50 backdrop-blur-2xl border border-border shadow-2xl space-y-6">
                    @foreach([
                        ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243', 'label' => 'Location', 'val' => 'Samarinda, ID'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Response Time', 'val' => '< 24 Hours'],
                        ['icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z', 'label' => 'Availability', 'val' => 'Freelance / Remote']
                    ] as $info)
                    <div class="flex items-center gap-5 group">
                        <div class="w-12 h-12 rounded-2xl bg-bg border border-border flex items-center justify-center text-primary group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-500 shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $info['icon'] }}"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-muted font-bold mb-0.5">{{ __($info['label']) }}</p>
                            <p class="text-sm text-text font-semibold">{{ __($info['val']) }}</p>
                        </div>
                    </div>
                    @endforeach

                    <hr class="border-border/50">

                    {{-- Quick Mini Stats --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 rounded-2xl bg-bg/50 border border-border/40">
                            <p class="text-2xl font-black text-text leading-none">{{ $projectCount }}+</p>
                            <p class="text-[9px] uppercase tracking-tighter text-muted mt-1">{{ __('Works') }}</p>
                        </div>
                        <div class="text-center p-4 rounded-2xl bg-bg/50 border border-border/40">
                            <p class="text-2xl font-black text-text leading-none">2+</p>
                            <p class="text-[9px] uppercase tracking-tighter text-muted mt-1">{{ __('Years Exp') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
