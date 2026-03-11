<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Fahri Noor Royyan — Laravel Web Developer Portfolio. Elegant Furina-inspired aesthetics from Fontaine.">

    <title>@yield('title', 'Fahri Noor Royyan | Portfolio')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    {{-- GSAP + Plugins --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>

    {{-- tsParticles --}}
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        :root {
            --navy:     #020617; /* Very dark slate, almost black */
            --deep:     #0f172a;
            --mid:      #1e293b;
            --cyan:     #06b6d4;
            --cyan-lt:  #67e8f9;
            --cyan-dim: #0891b2;
            --gold:     #eab308;
            --gold-lt:  #fde047;
            --white:    #f8fafc;
            --glass:    rgba(15, 23, 42, 0.4);
            --glass-bd: rgba(6, 182, 212, 0.15);
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--navy);
            color: var(--white);
            margin: 0; padding: 0;
            min-height: 100vh;
            overflow-x: hidden;
            background-image: 
                radial-gradient(ellipse at 50% -10%, rgba(34,211,238,0.1) 0%, transparent 80%),
                radial-gradient(ellipse at 80% 20%, rgba(8,145,178,0.05) 0%, transparent 60%),
                linear-gradient(180deg, #020814 0%, #050f2e 50%, #020814 100%);
            background-attachment: fixed;
        }

        .font-cinzel { font-family: 'Cinzel', serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }

        .card {
            background: var(--glass);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--glass-bd);
            border-radius: 1.25rem;
            transition: all 0.4s ease;
        }
        .card:hover { border-color: rgba(34,211,238,0.4); transform: translateY(-4px); }

        .text-cyan-grad {
            background: linear-gradient(135deg, #a5f3fc 0%, #22d3ee 45%, #67e8f9 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: linear-gradient(135deg, #0891b2, #1d4ed8);
            border: 1px solid rgba(34,211,238,0.3);
            padding: 0.75rem 1.75rem; border-radius: 0.75rem;
            color: white; font-weight: 600; text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(34,211,238,0.25); }

        .btn-outline {
            display: inline-flex; align-items: center; gap: 0.5rem;
            border: 1px solid rgba(34,211,238,0.4);
            padding: 0.75rem 1.75rem; border-radius: 0.75rem;
            color: #67e8f9; font-weight: 600; text-decoration: none;
            transition: all 0.3s ease; backdrop-filter: blur(4px);
        }
        .btn-outline:hover { background: rgba(34,211,238,0.05); transform: translateY(-2px); }

        .tag {
            display: inline-flex; padding: 0.2rem 0.6rem; 
            border: 1px solid rgba(34,211,238,0.2); border-radius: 999px;
            font-size: 0.7rem; color: #67e8f9; background: rgba(34,211,238,0.05);
        }

        .orb { position: fixed; border-radius: 50%; filter: blur(80px); pointer-events: none; opacity: 0.5; }

        .gsap-reveal { opacity: 0; transform: translateY(20px); }

        #cursor-glow {
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, transparent 70%);
            position: fixed; pointer-events: none; border-radius: 50%;
            transform: translate(-50%, -50%); z-index: 100;
        }
        #cursor-dot {
            width: 6px; height: 6px;
            background: var(--cyan);
            position: fixed; pointer-events: none; border-radius: 50%;
            transform: translate(-50%, -50%); z-index: 101;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.8);
        }

        /* Section Layout Helpers */
        .section-label { font-family: 'Cinzel', serif; font-size: .7rem; letter-spacing: .25em; text-transform: uppercase; color: var(--cyan); opacity: .7; display: block; margin-bottom: .75rem; }
        .section-title { font-family: 'Cinzel', serif; font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 2rem; line-height: 1; }
        .section-line { display: block; width: 60px; height: 3px; background: linear-gradient(90deg, var(--cyan), transparent); margin-bottom: 3rem; }

        /* Input Styles */
        .input-furina {
            width: 100%; background: rgba(255,255,255,.04); border: 1px solid rgba(34,211,238,.2);
            border-radius: .75rem; padding: .75rem 1rem; color: var(--white); font-size: .9rem; outline: none; transition: all .3s;
        }
        .input-furina:focus { border-color: var(--cyan); box-shadow: 0 0 0 3px rgba(34,211,238,.1); }
    </style>
</head>
<body>
    {{-- Preloader Matrix/Terminal Style --}}
    <div id="sys-preloader" class="fixed inset-0 z-[999999] bg-[#020617] flex flex-col items-center justify-center font-mono overflow-hidden">
        {{-- Faint Grid for Preloader --}}
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(var(--cyan) 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <div class="relative z-10 flex flex-col items-start max-w-md w-full px-6">
            {{-- Spinning/Glitching Logo or Text --}}
            <div class="text-cyan-400 font-bold text-2xl mb-8 tracking-[0.2em] relative flex items-center gap-3">
                <span class="w-3 h-3 bg-cyan-400 animate-pulse"></span>
                <span class="glitch-text" data-text="INITIALIZING">INITIALIZING</span>
            </div>
            
            {{-- Terminal Output Logs Simulation --}}
            <div class="mb-4 text-xs text-cyan-500/60 w-full h-24 overflow-hidden relative font-mono leading-relaxed">
                <div id="sys-logs" class="absolute bottom-0 left-0 w-full flex flex-col gap-1.5">
                    <div class="opacity-0 flex gap-2"><span class="text-cyan-600">></span> SYSTEM_BOOT SEQUENCE INITIATED...</div>
                    <div class="opacity-0 flex gap-2"><span class="text-cyan-600">></span> LOADING_CORE_MODULES... <span class="text-green-400">[OK]</span></div>
                    <div class="opacity-0 flex gap-2"><span class="text-cyan-600">></span> ESTABLISHING_NEURAL_LINK... <span class="text-green-400">[OK]</span></div>
                    <div class="opacity-0 flex gap-2"><span class="text-cyan-600">></span> RENDERING_ENVIRONMENT...</div>
                </div>
            </div>

            {{-- Progress Bar --}}
            <div class="w-full h-[2px] border-b border-cyan-900/40 relative overflow-hidden bg-transparent">
                <div id="sys-progress" class="absolute top-0 left-0 h-full bg-cyan-400 w-0 shadow-[0_0_15px_rgba(6,182,212,1)]"></div>
            </div>
        </div>
    </div>

    <div id="cursor-glow"></div>
    <div id="cursor-dot"></div>

    {{-- Ambient effects --}}
    <div class="orb" style="width:600px;height:600px;background:rgba(6,182,212,0.06);top:-15%;right:-10%;z-index:-1;"></div>
    <div class="orb" style="width:500px;height:500px;background:rgba(8,145,178,0.04);bottom:5%;left:-10%;z-index:-1;"></div>
    <div id="tsparticles" style="position:fixed;inset:0;z-index:-2;pointer-events:none;"></div>

    <div class="relative min-h-screen">
        {{-- Navbar --}}
        @if(!request()->routeIs('dashboard*'))
            @include('components.navbar')
        @endif

        {{-- Main --}}
        <main>
            {{ $slot }}
        </main>

        {{-- Footer --}}
        @if(!request()->routeIs('dashboard*'))
            @include('components.footer')
        @endif

        {{-- Back to Top --}}
        <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-400/20 backdrop-blur-xl text-cyan-400 flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 z-50 hover:bg-cyan-500 hover:text-white group">
            <svg class="w-5 h-5 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
        </button>
    </div>

    <script>
        gsap.registerPlugin(ScrollTrigger, TextPlugin);

        // Back to Top Logic
        const btt = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                btt.classList.remove('opacity-0', 'pointer-events-none');
                btt.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                btt.classList.add('opacity-0', 'pointer-events-none');
                btt.classList.remove('opacity-100', 'pointer-events-auto');
            }
        });
        btt.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // --- PRELOADER LOGIC ---
        window.addEventListener('load', () => {
            const tlPreloader = gsap.timeline();
            
            // Animate progress bar
            tlPreloader.to('#sys-progress', {
                width: '100%',
                duration: 1.5,
                ease: 'power2.inOut'
            })
            // Animate pretend logs
            .to('#sys-logs div', {
                opacity: 1,
                y: -5,
                stagger: 0.3,
                duration: 0.2,
                ease: 'power1.out'
            }, "-=1.5")
            // Glitch text change finish
            .set('.glitch-text', { text: "SYS_ONLINE" }, "-=0.2")
            // Slide/fade out the whole preloader
            .to('#sys-preloader', {
                yPercent: -100,
                opacity: 0,
                duration: 0.8,
                ease: 'power4.inOut',
                delay: 0.5,
                onComplete: () => {
                    document.getElementById('sys-preloader').style.display = 'none';
                    // Trigger custom event so page specific GSAP knows it can start
                    document.dispatchEvent(new CustomEvent('preloaderDone'));
                }
            });
        });

        // Cursor
        const glow = document.getElementById('cursor-glow');
        const dot = document.getElementById('cursor-dot');
        
        document.addEventListener('mousemove', (e) => {
            gsap.to(glow, { x: e.clientX, y: e.clientY, duration: 0.6, ease: 'power2.out' });
            gsap.to(dot, { x: e.clientX, y: e.clientY, duration: 0.1, ease: 'power2.out' });
        });

        // Particles
        tsParticles.load("tsparticles", {
            particles: {
                number: { value: 30, density: { enable: true, area: 1200 } },
                color: { value: ["#06b6d4", "#38bdf8"] },
                opacity: { value: { min: 0.05, max: 0.2 } },
                size: { value: { min: 1, max: 2 } },
                move: { enable: true, speed: 0.3 },
                links: { enable: true, distance: 180, color: "#06b6d4", opacity: 0.05, width: 1 }
            },
            interactivity: {
                events: {
                    onClick: { enable: true, mode: "push" },
                    onHover: { enable: true, mode: "grab" },
                },
                modes: {
                    push: { quantity: 2 },
                    grab: { distance: 150, links: { opacity: 0.2 } }
                }
            }
        });

        // Reveals
        document.addEventListener('preloaderDone', () => {
            gsap.utils.toArray('.gsap-reveal').forEach(el => {
                gsap.fromTo(el, { y: 50, opacity: 0 }, {
                    scrollTrigger: { 
                        trigger: el, 
                        start: 'top 90%',
                        toggleActions: 'play none none none'
                    },
                    y: 0, opacity: 1, duration: 1.2, ease: 'expo.out'
                });
            });

            // Stagger
            gsap.utils.toArray('.gsap-stagger').forEach(container => {
                gsap.fromTo(container.children, { y: 30, opacity: 0 }, {
                    scrollTrigger: { 
                        trigger: container, 
                        start: 'top 90%' 
                    },
                    y: 0, opacity: 1, duration: 1, ease: 'power3.out', stagger: 0.15
                });
            });
        });

        // Hover tilt effect (mantappp!)
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const xc = rect.width / 2;
                const yc = rect.height / 2;
                const dx = x - xc;
                const dy = y - yc;
                
                gsap.to(card, {
                    rotationY: dx / 15,
                    rotationX: -dy / 15,
                    ease: 'power2.out',
                    duration: 0.5,
                    transformPerspective: 1000
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    rotationY: 0,
                    rotationX: 0,
                    ease: 'elastic.out(1, 0.3)',
                    duration: 1.2
                });
            });
        });

        // Counters
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count);
            ScrollTrigger.create({
                trigger: el, start: 'top 92%',
                onEnter: () => {
                    gsap.from({ val: 0 }, {
                        val: target, duration: 2, ease: 'power2.out',
                        onUpdate() { el.textContent = Math.round(this.targets()[0].val) + (el.dataset.suffix || ''); }
                    });
                }
            });
        });
    </script>
</body>
</html>