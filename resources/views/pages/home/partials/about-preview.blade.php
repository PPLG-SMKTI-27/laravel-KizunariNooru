{{-- ══════════════════════════════════════════════════════
     ABOUT SECTION — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<section id="about" class="py-32 relative overflow-hidden bg-bg transition-colors duration-700">

    {{-- Background Fluid Elements --}}
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/10 blur-[120px] rounded-full animate-liquid"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-2/5 blur-[100px] rounded-full animate-liquid" style="animation-delay: -4s"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        {{-- Section Header --}}
        <div class="gsap-reveal mb-16 text-center lg:text-left">
            <span class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-[10px] font-bold uppercase tracking-[0.3em] mb-4">
                The Developer
            </span>
            <h2 class="font-cinzel text-4xl md:text-5xl font-black text-text">
                About <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">Me</span>
            </h2>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 items-center">

            {{-- Content Column --}}
            <div class="lg:col-span-3 space-y-8 gsap-reveal">
                {{-- Single Paragraph Content (3 Sentences Max) --}}
                <p class="text-lg md:text-xl text-muted leading-relaxed font-light">
                    Saya <span class="text-text font-bold decoration-primary/40 underline underline-offset-4">Fahri Noor Royyan</span>, siswa SMK TI yang berdedikasi dalam mengeksplorasi sinergi antara <span class="text-primary italic font-medium">software engineering</span>, AI, dan sistem robotika.
                    Terinspirasi oleh presisi arsitektur Fontaine, saya membangun solusi digital yang tidak hanya fungsional secara teknis tetapi juga estetis dan efisien.
                    Saat ini, saya fokus mengembangkan ekosistem web modern yang mampu beradaptasi dengan kebutuhan masa depan.
                </p>

                {{-- Skill Tags Liquid --}}
                <div class="flex flex-wrap gap-2 pt-4">
                    @foreach(['Laravel','PHP','MySQL','Tailwind','Alpine.js','Git'] as $t)
                        <span class="px-4 py-1.5 rounded-xl bg-surface/40 backdrop-blur-md border border-border text-[11px] font-bold text-muted hover:border-primary/50 hover:text-primary transition-all duration-300">
                            {{ $t }}
                        </span>
                    @endforeach
                </div>

                {{-- Quote Card Glass --}}
                <div class="p-6 rounded-[2rem] bg-surface/30 backdrop-blur-xl border border-white/10 shadow-xl relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-primary to-primary-2"></div>
                    <p class="font-playfair text-text italic text-lg leading-relaxed relative z-10">
                        "The most precise mechanism is useless without the soul to operate it."
                    </p>
                    <p class="text-primary/60 text-[10px] mt-3 tracking-[0.2em] uppercase font-bold">— Inspired by Furina</p>
                </div>
            </div>

            {{-- Info & Stats Column --}}
            <div class="lg:col-span-2 space-y-6 gsap-stagger">

                {{-- Glass Info Card --}}
                <div class="p-8 rounded-[2.5rem] bg-surface/50 backdrop-blur-2xl border border-border shadow-2xl space-y-6">
                    @foreach([
                        ['icon' => 'M12 14l9-5-9-5-9 5 9 5z', 'label' => 'School', 'val' => 'SMKTI Airlangga'],
                        ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243', 'label' => 'Loc', 'val' => 'Samarinda, ID'],
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'label' => 'Passion', 'val' => '100% Logic & Art']
                    ] as $info)
                    <div class="flex items-center gap-5 group">
                        <div class="w-12 h-12 rounded-2xl bg-bg border border-border flex items-center justify-center text-primary group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-500 shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $info['icon'] }}"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-muted font-bold mb-0.5">{{ $info['label'] }}</p>
                            <p class="text-sm text-text font-semibold">{{ $info['val'] }}</p>
                        </div>
                    </div>
                    @endforeach

                    <hr class="border-border/50">

                    {{-- Quick Mini Stats --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 rounded-2xl bg-bg/50 border border-border/40">
                            <p class="text-2xl font-black text-text leading-none">{{ $projectCount }}+</p>
                            <p class="text-[9px] uppercase tracking-tighter text-muted mt-1">Works</p>
                        </div>
                        <div class="text-center p-4 rounded-2xl bg-bg/50 border border-border/40">
                            <p class="text-2xl font-black text-text leading-none">2+</p>
                            <p class="text-[9px] uppercase tracking-tighter text-muted mt-1">Years Exp</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
