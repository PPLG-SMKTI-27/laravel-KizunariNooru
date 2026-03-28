{{-- ══════════════════════════════════════════════════════
     SERVICES SECTION — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<section id="services" class="py-32 relative overflow-hidden bg-bg">

    {{-- Floating Liquid Orbs (Background Decor) --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-96 h-96 bg-primary/5 blur-[120px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-primary-2/5 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="gsap-reveal mb-24 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 mb-6 backdrop-blur-md">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                <span class="text-[10px] font-bold text-primary uppercase tracking-[0.4em]">Specialized Solutions</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black text-text font-cinzel tracking-tight leading-tight">
                Crafting <span class="bg-gradient-to-r from-primary via-primary-2 to-primary bg-clip-text text-transparent italic">Digital Fluidity</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-primary/50 to-transparent mx-auto mt-8 rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-10 gsap-stagger">
            @foreach([
                [
                    'svg'=>'<path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" stroke-width="1.5"/><path d="M8 8l-2 2 2 2" opacity="0.3" stroke-width="1.5"/><path d="M16 12l2-2-2-2" opacity="0.3" stroke-width="1.5"/>',
                    'title'=>'Web Development',
                    'label'=>'Scalable Systems',
                    'desc'=>'Membangun arsitektur website yang tangguh, responsif, dan berperforma tinggi dengan ekosistem Laravel modern.'
                ],
                [
                    'svg'=>'<path d="M4 5h16v2H4zM4 13h8v6H4zM16 13h4v6h-4z" opacity="0.2" stroke-width="1.2"/><rect x="2" y="3" width="20" height="4" rx="1" stroke-width="1.5"/><rect x="2" y="11" width="11" height="10" rx="1" stroke-width="1.5"/><rect x="15" y="11" width="7" height="10" rx="1" stroke-width="1.5"/>',
                    'title'=>'UI/UX Design',
                    'label'=>'Visual Identity',
                    'desc'=>'Transformasi ide menjadi antarmuka intuitif dengan estetika premium yang mengutamakan kenyamanan pengguna.'
                ],
                [
                    'svg'=>'<circle cx="12" cy="12" r="3" stroke-width="1.5"/><path d="M12 2v3m0 14v3M4.22 4.22l2.12 2.12m11.32 11.32l2.12 2.12M2 12h3m14 0h3M4.22 19.78l2.12-2.12m11.32-11.32l2.12-2.12" stroke-width="1.5" stroke-linecap="round"/>',
                    'title'=>'Web Maintenance',
                    'label'=>'Optimal Performance',
                    'desc'=>'Pemantauan berkala, pembaruan keamanan, dan optimasi berkelanjutan untuk memastikan stabilitas sistem Anda.'
                ]
            ] as $service)
            <div class="group relative">
                {{-- Glass Card --}}
                <div class="h-full p-10 rounded-[3rem] bg-surface/10 backdrop-blur-2xl border border-white/5 group-hover:border-primary/30 transition-all duration-700 flex flex-col relative overflow-hidden shadow-2xl">

                    {{-- Interior Light Refraction --}}
                    <div class="absolute -top-24 -left-24 w-48 h-48 bg-primary/10 blur-[60px] rounded-full group-hover:bg-primary/20 transition-all duration-700"></div>

                    {{-- Icon Container --}}
                    <div class="w-20 h-20 rounded-[2rem] bg-bg/50 border border-white/10 flex items-center justify-center text-primary mb-10 shadow-inner group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 relative z-10">
                        <svg class="w-10 h-10 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $service['svg'] !!}
                        </svg>
                    </div>

                    {{-- Text Content --}}
                    <div class="relative z-10">
                        <span class="text-[10px] font-mono text-primary/60 uppercase tracking-[0.3em] mb-3 block italic">{{ $service['label'] }}</span>
                        <h3 class="text-2xl font-bold text-text mb-5 group-hover:text-primary transition-colors duration-300">{{ $service['title'] }}</h3>
                        <p class="text-muted text-sm leading-relaxed mb-8 opacity-80 group-hover:opacity-100 transition-opacity">
                            {{ $service['desc'] }}
                        </p>
                    </div>

                    {{-- Decorative Corner Trace --}}
                    <div class="absolute bottom-6 right-10 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-4 group-hover:translate-x-0">
                        <span class="text-[9px] font-mono text-primary uppercase tracking-widest">Explore Service</span>
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </div>

                {{-- Outer Glow Effect --}}
                <div class="absolute inset-0 rounded-[3.5rem] bg-primary/5 blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
