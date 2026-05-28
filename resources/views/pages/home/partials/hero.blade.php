{{-- ══════════════════════════════════════════════════════
     HERO SECTION — LIQUID GLASS EDITION
══════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 bg-bg transition-colors duration-700 hero-gradient-mesh">

{{-- Background Liquid Orbs (Glassmorphism Base) --}}
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-primary/10 blur-[120px] rounded-full animate-liquid"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[400px] h-[400px] bg-primary-2/10 blur-[100px] rounded-full animate-liquid" style="animation-delay: -2s"></div>
    </div>

    {{-- Spline 3D Integration — Smart Fallback for Low-Spec Devices --}}
    <div class="absolute inset-0 z-0 opacity-40 mix-blend-overlay pointer-events-none" id="hero-spline-wrapper">
        {{-- Fallback gradient (always shown initially, hidden if Spline loads) --}}
        <div id="hero-spline-fallback" class="absolute inset-0 flex items-center justify-center">
            <div class="w-[80%] h-[80%] rounded-full bg-gradient-to-br from-primary/30 via-primary-2/20 to-transparent blur-[80px] animate-pulse"></div>
            <div class="absolute w-[50%] h-[50%] rounded-full bg-primary-2/20 blur-[60px] animate-liquid" style="animation-delay:-2s"></div>
        </div>
        <div id="hero-spline-container" class="absolute inset-0 opacity-0 transition-opacity duration-1000"></div>
    </div>
    <script>
        // Smart Spline loader — only load on capable devices
        (function() {
            const cores = navigator.hardwareConcurrency || 2;
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            const isCapable = cores >= 4 && !prefersReduced;

            if (isCapable) {
                // Load Spline only on capable devices
                const script = document.createElement('script');
                script.type = 'module';
                script.src = 'https://unpkg.com/@splinetool/viewer@1.0.51/build/spline-viewer.js';
                script.onload = function() {
                    const viewer = document.createElement('spline-viewer');
                    viewer.setAttribute('url', 'https://prod.spline.design/6Wq1Q7YGyM-iab9i/scene.splinecode');
                    viewer.style.width = '100%';
                    viewer.style.height = '100%';
                    const container = document.getElementById('hero-spline-container');
                    if (container) {
                        container.appendChild(viewer);
                        // Fade in Spline, fade out simple fallback
                        container.style.opacity = '1';
                        const fallback = document.getElementById('hero-spline-fallback');
                        if (fallback) {
                            setTimeout(() => { fallback.style.opacity = '0'; fallback.style.transition = 'opacity 1s'; }, 1500);
                        }
                    }
                };
                document.head.appendChild(script);
            }
            // On weak/mobile devices: fallback gradient is shown and no GPU is taxed
        })();
    </script>

    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-12">

            {{-- ── LEFT COLUMN ── --}}
            <div class="flex-1 text-center lg:text-left">

                {{-- Status Badge --}}
                <div id="hero-badge" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface/40 backdrop-blur-md border border-white/10 shadow-lg mb-8 animate-float">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-success shadow-[0_0_10px_var(--color-success)]"></span>
                    </span>
                    <span class="text-[10px] font-bold tracking-[0.2em] text-muted uppercase">{{ __('Ready for Collaboration') }}</span>
                </div>

                <div class="space-y-4 mb-8">
                    {{-- Name with Gradient Text --}}
                    <h1 id="hero-title" class="font-display text-[clamp(2.5rem,6vw,4.5rem)] font-black leading-[1.1]">
                        <span class="bg-gradient-to-r from-text via-text to-text/70 bg-clip-text text-transparent">
                            {{ $settings['hero_name'] ?? 'Fahri Noor Royyan' }}
                        </span>
                    </h1>

                    {{-- Animated Tagline with Typewriter Effect --}}
                    <p class="text-xl md:text-2xl font-medium text-muted h-[1.5em] flex items-center justify-center lg:justify-start">
                        <span id="typewriter-text" class="border-r-2 border-primary/50 pr-1 min-w-[1px]"></span>
                    </p>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const textElement = document.getElementById('typewriter-text');
                    const phrases = [
                        "{{ __('Full-Stack Developer') }}",
                        "{{ __('Laravel Specialist') }}",
                        "{{ __('UI/UX Enthusiast') }}",
                        "{{ __('Creative Web Architect') }}"
                    ];
                    let phraseIndex = 0;
                    let characterIndex = 0;
                    let isDeleting = false;
                    let typeSpeed = 100;

                    function type() {
                        const currentPhrase = phrases[phraseIndex];
                        
                        if (isDeleting) {
                            textElement.textContent = currentPhrase.substring(0, characterIndex - 1);
                            characterIndex--;
                            typeSpeed = 50;
                        } else {
                            textElement.textContent = currentPhrase.substring(0, characterIndex + 1);
                            characterIndex++;
                            typeSpeed = 100;
                        }

                        if (!isDeleting && characterIndex === currentPhrase.length) {
                            isDeleting = true;
                            typeSpeed = 2000; // Pause at end
                        } else if (isDeleting && characterIndex === 0) {
                            isDeleting = false;
                            phraseIndex = (phraseIndex + 1) % phrases.length;
                            typeSpeed = 500;
                        }

                        setTimeout(type, typeSpeed);
                    }

                    type();
                });
                </script>

                <p class="gsap-reveal text-muted text-base md:text-lg max-w-xl leading-relaxed mb-10 mx-auto lg:mx-0 font-light">
                    {{ __('Crafting fluid digital solutions with a blend of technical precision and aesthetic elegance.') }}
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="#projects" class="magnetic-btn-reveal group relative px-8 py-4 bg-primary text-white rounded-2xl overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-lg shadow-primary/20">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <span class="relative z-10 font-bold text-sm flex items-center gap-2">
                            {{ __('View Portfolio') }} <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </a>

                    <a href="#contact" class="magnetic-btn-reveal px-8 py-4 bg-surface/40 backdrop-blur-md border border-border text-text rounded-2xl font-bold text-sm hover:bg-surface/80 hover:border-primary/30 transition-all active:scale-95">
                        {{ __('Get in Touch') }}
                    </a>

                    <a href="{{ asset('storage/' . ($settings['cv_file'] ?? 'CV_Fahri_Noor_Royyan.png')) }}" download class="magnetic-btn-reveal px-8 py-4 bg-primary/10 border border-primary/20 text-primary rounded-2xl font-bold text-sm hover:bg-primary/20 hover:shadow-[0_0_20px_rgba(34,211,238,0.2)] transition-all active:scale-95 flex items-center gap-2">
                        <i class="fa-solid fa-file-arrow-down"></i> {{ __('Download CV') }}
                    </a>
                </div>

                {{-- Micro Stats --}}
                <div class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-8 border-t border-border/30 pt-8">
                    @php
                        $startYear = 2024; // Asumsi tahun mulai belajar IT
                        $yearsExperience = max(1, date('Y') - $startYear);
                        $dynamicExperienceStat = $yearsExperience . '+';

                        $projectCount = \App\Models\Project::count();
                        $dynamicProjectStat = $projectCount > 0 ? $projectCount . '+' : '1+';

                        $skillCount = \App\Models\Skill::count();
                        $dynamicSkillStat = $skillCount > 0 ? $skillCount . '+' : '5+';
                    @endphp
                    @foreach([
                        ['v'=> $dynamicExperienceStat, 'l'=> 'Years Experience'],
                        ['v'=> $dynamicProjectStat, 'l'=> 'Delivered Projects'],
                        ['v'=> $dynamicSkillStat, 'l'=> 'Technologies'],
                    ] as $s)
                    <div class="flex flex-col text-center lg:text-left group">
                        <span class="text-2xl font-bold font-display text-primary group-hover:scale-110 transition-transform duration-300 inline-block">{{ $s['v'] }}</span>
                        <span class="text-[10px] uppercase tracking-widest text-muted font-bold mt-1">{{ __($s['l']) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ── RIGHT COLUMN (The "Liquid Lens" Portrait) ── --}}
            <div class="flex-1 relative flex justify-center items-center">

                {{-- Decorative Liquid Background --}}
                <div class="absolute w-[120%] h-[120%] bg-primary/5 rounded-full blur-3xl animate-pulse"></div>

                {{-- Main Image Container (The Glass Lens) --}}
                <div id="hero-art" class="relative group z-10">
                    {{-- Interactive Glow behind --}}
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary to-primary-2 rounded-[3.5rem] blur-[80px] opacity-40 group-hover:opacity-70 transition-opacity duration-700 pointer-events-none animate-pulse"></div>

                    <div data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.5" class="relative w-64 h-80 md:w-80 md:h-[450px] rounded-[3rem] p-3 bg-white/5 backdrop-blur-3xl border border-white/20 shadow-[0_0_50px_rgba(34,211,238,0.2)] overflow-hidden transition-all duration-700 transform-gpu">

                        <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-transparent pointer-events-none z-10 mix-blend-overlay"></div>

                        <div class="w-full h-full rounded-[2.2rem] overflow-hidden bg-container relative">
                            <img src="{{ asset('Foto_pribadi.jpg') }}"
                                 class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition-all duration-1000 group-hover:scale-110"
                                 alt="Professional Headshot">

                            <div class="absolute inset-0 bg-gradient-to-tr from-primary/30 via-transparent to-white/20 mix-blend-overlay pointer-events-none"></div>
                        </div>

                        {{-- Floating Badge --}}
                        <div class="absolute bottom-6 -right-4 bg-surface/90 backdrop-blur-xl border border-border px-4 py-2 rounded-xl shadow-[0_10px_30px_rgba(0,0,0,0.5)] rotate-6 group-hover:rotate-0 transition-transform duration-500 z-20">
                            <span class="text-[10px] font-black text-primary uppercase">{{ __('Full-Stack Dev') }}</span>
                        </div>
                    </div>

                    {{-- Abstract Shapes around the photo --}}
                    <div class="absolute -top-6 -left-6 w-20 h-20 bg-primary-2/40 rounded-full blur-2xl animate-liquid pointer-events-none"></div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-primary/30 rounded-full blur-3xl animate-liquid pointer-events-none" style="animation-delay: -3s"></div>
                </div>

            </div>
        </div>
    </div>

    {{-- ── SCROLL INDICATOR ── --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2 pointer-events-none opacity-60">
        <span class="text-[10px] font-bold tracking-[0.3em] uppercase text-muted animate-pulse">{{ __('Scroll') }}</span>
        <div class="w-[2px] h-12 bg-gradient-to-b from-primary via-primary/20 to-transparent rounded-full overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-full bg-primary animate-scroll-line"></div>
        </div>
    </div>

    <style>
    @keyframes scroll-line {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100%); }
    }
    .animate-scroll-line {
        animation: scroll-line 2s cubic-bezier(.76,.17,.24,.84) infinite;
    }
    </style>
</section>
