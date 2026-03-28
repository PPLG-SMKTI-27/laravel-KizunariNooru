{{-- ══════════════════════════════════════════════════════
     HERO SECTION — LIQUID GLASS EDITION
══════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 bg-bg transition-colors duration-700">

    {{-- Background Liquid Orbs (Glassmorphism Base) --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-primary/20 blur-[120px] rounded-full animate-liquid"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[400px] h-[400px] bg-primary-2/20 blur-[100px] rounded-full animate-liquid" style="animation-delay: -2s"></div>
    </div>

    {{-- Spline 3D Integration --}}
    <div class="absolute inset-0 z-0 opacity-40 mix-blend-overlay pointer-events-auto">
        <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.51/build/spline-viewer.js"></script>
        <spline-viewer url="https://prod.spline.design/6Wq1Q7YGyM-iab9i/scene.splinecode"></spline-viewer>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-16">

            {{-- ── LEFT COLUMN ── --}}
            <div class="flex-1 text-center lg:text-left">

                {{-- Liquid Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface/40 backdrop-blur-md border border-white/10 shadow-lg mb-8 animate-float">
                    <span class="flex h-2 w-2 rounded-full bg-success shadow-[0_0_10px_var(--color-success)]"></span>
                    <span class="text-[10px] font-bold tracking-[0.2em] text-muted uppercase">Ready for Collaboration</span>
                </div>

                {{-- Hero Text --}}
                <div class="space-y-2 mb-8">
                    <h1 class="font-cinzel text-[clamp(2.5rem,8vw,4.5rem)] font-black leading-[0.9] text-text">
                        Fahri Noor <br>
                        <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">Royyan</span>
                    </h1>
                </div>

                <p class="text-muted text-base md:text-lg max-w-xl leading-relaxed mb-10 mx-auto lg:mx-0 font-light backdrop-blur-[2px]">
                    Crafting <span class="text-text font-medium underline decoration-primary/30">fluid digital solutions</span> with a blend of architectural precision and aesthetic elegance. Based in the digital realm of Fontaine.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="#projects" class="group relative px-8 py-4 bg-primary text-white rounded-2xl overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-lg shadow-primary/20">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <span class="relative z-10 font-bold text-sm flex items-center gap-2">
                            View Portfolio <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </a>

                    <a href="#contact" class="px-8 py-4 bg-surface/40 backdrop-blur-md border border-border text-text rounded-2xl font-bold text-sm hover:bg-surface/80 transition-all active:scale-95">
                        Get in Touch
                    </a>
                </div>

                {{-- Micro Stats --}}
                <div class="mt-16 flex flex-wrap gap-8 justify-center lg:justify-start border-t border-border/50 pt-8">
                    @foreach([['v'=>'2+', 'l'=>'Experience'], ['v'=>$projectCount, 'l'=>'Projects'], ['v'=>'99%', 'l'=>'Precision']] as $s)
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-text">{{ $s['v'] }}</span>
                        <span class="text-[10px] uppercase tracking-widest text-muted font-bold">{{ $s['l'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ── RIGHT COLUMN (The "Liquid Lens" Portrait) ── --}}
            <div class="flex-1 relative flex justify-center items-center">

                {{-- Decorative Liquid Background --}}
                <div class="absolute w-[120%] h-[120%] bg-primary/5 rounded-full blur-3xl animate-pulse"></div>

                {{-- Main Image Container (The Glass Lens) --}}
                <div class="relative group">
                    <div class="relative w-64 h-80 md:w-80 md:h-[450px] rounded-[3rem] p-3 bg-white/5 backdrop-blur-2xl border border-white/20 shadow-2xl overflow-hidden animate-float">

                        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 to-transparent pointer-events-none"></div>

                        <div class="w-full h-full rounded-[2.2rem] overflow-hidden bg-container relative">
                            <img src="{{ asset('photo-profile.jpeg') }}"
                                 class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110"
                                 alt="Profile">

                            <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 via-transparent to-white/10 mix-blend-overlay"></div>
                        </div>

                        {{-- Floating Badge --}}
                        <div class="absolute bottom-6 -right-4 bg-surface/90 backdrop-blur-xl border border-border px-4 py-2 rounded-xl shadow-xl rotate-6 group-hover:rotate-0 transition-transform">
                            <span class="text-[10px] font-black text-primary uppercase">Full-Stack Dev</span>
                        </div>
                    </div>

                    {{-- Abstract Shapes around the photo --}}
                    <div class="absolute -top-6 -left-6 w-20 h-20 bg-primary-2/30 rounded-full blur-xl animate-liquid"></div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-primary/20 rounded-full blur-2xl animate-liquid" style="animation-delay: -3s"></div>
                </div>

            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3">
        <div class="w-[1px] h-12 bg-gradient-to-b from-primary to-transparent"></div>
        <span class="text-[9px] uppercase tracking-[0.4em] text-muted rotate-90 origin-left mt-8">Explore</span>
    </div>
</section>
