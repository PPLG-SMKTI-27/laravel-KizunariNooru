{{-- ══════════════════════════════════════════════════════
     SERVICES SECTION — DB-DRIVEN
══════════════════════════════════════════════════════ --}}
<section id="services" class="py-32 relative overflow-hidden bg-bg">

    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-96 h-96 bg-primary/5 blur-[120px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-primary-2/5 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        <div class="gsap-reveal mb-24 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 mb-6 backdrop-blur-md">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                <span class="text-[10px] font-bold text-primary uppercase tracking-[0.4em]">{{ __('Specialized Solutions') }}</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black text-text font-cinzel tracking-tight leading-tight">
                {{ __('Professional') }} <span class="bg-gradient-to-r from-primary via-primary-2 to-primary bg-clip-text text-transparent italic">{{ __('Offerings') }}</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-primary/50 to-transparent mx-auto mt-8 rounded-full"></div>
        </div>

        @if($services->isEmpty())
        <div class="text-center py-20 text-muted text-sm italic opacity-50">
            {{ __('No services added yet. Add them from the dashboard!') }}
        </div>
        @else
        <div class="grid md:grid-cols-3 gap-10 gsap-stagger mb-24">
            @foreach($services as $service)
            <div class="group relative">
                <div class="h-full p-10 rounded-[3rem] bg-surface/10 backdrop-blur-2xl border border-white/5 group-hover:border-primary/30 transition-all duration-700 flex flex-col relative overflow-hidden shadow-2xl">
                    <div class="absolute -top-24 -left-24 w-48 h-48 bg-primary/10 blur-[60px] rounded-full group-hover:bg-primary/20 transition-all duration-700"></div>

                    <div class="w-20 h-20 rounded-[2rem] bg-bg/50 border border-border flex items-center justify-center text-primary mb-10 shadow-inner group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 relative z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service->svg_path ?? 'M13 10V3L4 14h7v7l9-11h-7z' }}"/>
                        </svg>
                    </div>

                    <div class="relative z-10 flex-grow">
                        <span class="text-[10px] font-bold text-primary/60 uppercase tracking-[0.3em] mb-3 block">{{ __($service->label) }}</span>
                        <h3 class="text-2xl font-bold text-text mb-5 group-hover:text-primary transition-colors duration-300 leading-tight">{{ __($service->title) }}</h3>
                        <p class="text-muted text-sm leading-relaxed mb-8 font-light">{{ __($service->description) }}</p>
                    </div>
                </div>
                <div class="absolute inset-0 rounded-[3.5rem] bg-primary/5 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- 5-Step Workflow --}}
        <div class="mt-32 max-w-5xl mx-auto gsap-reveal relative">
            <h3 class="text-center font-cinzel text-3xl font-bold text-text mb-16">{{ __('Development Workflow') }} <span class="text-primary italic">{{ __('Workflow') }}</span></h3>
            <div class="relative pl-8 md:pl-0">
                <div class="hidden md:block absolute top-8 left-[10%] right-[10%] h-0.5 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
                <div class="md:hidden absolute top-0 bottom-0 left-4 w-0.5 bg-gradient-to-b from-primary/30 via-primary/10 to-transparent"></div>
                <div class="grid md:grid-cols-5 gap-8">
                    @foreach([
                        ['step'=>'01','title'=>'Discovery','icon'=>'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'],
                        ['step'=>'02','title'=>'Design','icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['step'=>'03','title'=>'Development','icon'=>'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                        ['step'=>'04','title'=>'Testing','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['step'=>'05','title'=>'Maintenance','icon'=>'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
                    ] as $step)
                        <div class="relative flex md:flex-col items-center gap-6 md:gap-4 group">
                            <div class="relative z-10 w-16 h-16 md:w-20 md:h-20 shrink-0 bg-surface/50 backdrop-blur-md rounded-2xl border-2 border-primary/20 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 shadow-xl">
                                <span class="absolute -top-3 -right-3 w-6 h-6 rounded-full bg-border border-2 border-surface text-[9px] font-bold flex items-center justify-center text-text shadow-sm">{{ $step['step'] }}</span>
                                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $step['icon'] }}"/></svg>
                            </div>
                            <div class="md:text-center mt-2">
                                <h4 class="font-bold text-text mb-1 uppercase tracking-wider text-sm md:text-xs lg:text-sm">{{ __($step['title']) }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-24 text-center gsap-reveal">
            <a href="#contact" class="inline-flex items-center gap-4 px-8 py-5 rounded-full bg-gradient-to-r from-primary to-primary-2 text-white font-bold tracking-widest uppercase hover:scale-105 transition-transform duration-300 shadow-[0_10px_40px_rgba(59,130,246,0.3)]">
                {{ __('Have a project in mind? Let\'s Discuss') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>
