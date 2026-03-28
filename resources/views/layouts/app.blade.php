<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Fahri Noor Royyan — Laravel Web Developer Portfolio. Elegant Furina-inspired aesthetics from Fontaine.">
    <title>Fahri | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="{{ !request()->routeIs('dashboard*') ? 'bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col' : 'bg-[#050f2e] text-white min-h-screen' }}">
    <div class="{{ !request()->routeIs('dashboard*') ? 'flex-grow flex flex-col' : '' }}">

    {{-- <div id="matrix-preloader">
        <canvas id="matrix-canvas"></canvas>
        <div class="matrix-overlay"></div>
        <div class="global-scanline"></div>
        <div class="scanbar"></div>

        <div class="terminal-panel" id="terminal-panel">
            <div class="terminal-header">
                <div class="terminal-title">
                    <span class="blinker-block" id="term-blinker"></span>
                    <span>ORATRICE_OS</span>
                </div>
                <div class="terminal-version">v4.2.0-FONTAINE</div>
            </div>

            <div class="terminal-output" id="term-output">
            </div>

            <div class="terminal-progress-container">
                <div class="progress-text-row">
                    <span>HYDRO_SYNC</span>
                    <span id="term-pct">0%</span>
                </div>
                <div class="progress-bar-wrapper">
                    <div class="progress-bar-fill" id="term-bar-fill"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="cursor-glow"></div>
    <div id="cursor-dot"></div>

    {{-- <div class="orb" style="width:600px;height:600px;background:rgba(6,182,212,0.06);top:-15%;right:-10%;z-index:-1;"></div>
    <div class="orb" style="width:500px;height:500px;background:rgba(8,145,178,0.04);bottom:5%;left:-10%;z-index:-1;"></div>
    <div id="tsparticles" style="position:fixed;inset:0;z-index:-2;pointer-events:none;"></div> --}}

    <div class="relative min-h-screen">
        @if(!request()->routeIs('dashboard*'))
            @include('components.navbar')
        @endif

        @if(session('success') || session('error'))
        <div x-data="{ show: true, progress: 100 }"
            x-show="show"
            x-init="
                let timer = setInterval(() => {
                    progress -= 1;
                    if (progress <= 0) {
                        clearInterval(timer);
                        show = false;
                    }
                }, 50); // 5000ms / 100 steps = 50ms per step
            "
            class="fixed top-24 right-6 z-[100] max-w-[320px] w-full px-4"
            x-transition:enter="transition ease-[cubic-bezier(0.23,1,0.32,1)] duration-700 transform"
            x-transition:enter-start="translate-x-full opacity-0 scale-90 blur-lg"
            x-transition:enter-end="translate-x-0 opacity-100 scale-100 blur-0"
            x-transition:leave="transition ease-in duration-500 transform"
            x-transition:leave-start="translate-x-0 opacity-100 blur-0"
            x-transition:leave-end="translate-x-12 opacity-0 blur-md">

            @if(session('success'))
            <div class="relative group overflow-hidden rounded-[2rem] bg-surface/40 backdrop-blur-3xl border border-white/10 shadow-[0_20px_40px_rgba(0,0,0,0.3)] p-5 flex items-center gap-4">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-success/10 blur-[40px] rounded-full"></div>

                <div class="shrink-0 w-12 h-12 rounded-2xl bg-success/10 border border-success/20 flex items-center justify-center text-success shadow-inner">
                    <svg class="w-6 h-6 drop-shadow-[0_0_8px_rgba(var(--color-success-rgb),0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="flex-1">
                    <h4 class="text-[10px] font-black text-text uppercase tracking-[0.3em] opacity-50">System.Success</h4>
                    <p class="text-xs font-medium text-text/90 mt-1 leading-relaxed">{{ session('success') }}</p>
                </div>

                <button @click="show = false" class="text-text/20 hover:text-primary transition-colors p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="absolute bottom-0 left-0 h-[3px] bg-gradient-to-r from-success/50 to-success transition-all duration-100 ease-linear"
                    :style="'width: ' + progress + '%'"></div>
            </div>
            @endif

            @if(session('error') || $errors->any())
            <div class="relative group overflow-hidden rounded-[2rem] bg-surface/40 backdrop-blur-3xl border border-error/20 shadow-[0_20px_40px_rgba(255,0,0,0.1)] p-5 flex items-center gap-4">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-error/10 blur-[40px] rounded-full"></div>

                <div class="shrink-0 w-12 h-12 rounded-2xl bg-error/10 border border-error/20 flex items-center justify-center text-error shadow-inner">
                    <svg class="w-6 h-6 drop-shadow-[0_0_8px_rgba(var(--color-error-rgb),0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <div class="flex-1">
                    <h4 class="text-[10px] font-black text-error uppercase tracking-[0.3em] opacity-80">System.Exception</h4>
                    <p class="text-xs font-medium text-text/90 mt-1 leading-relaxed">{{ session('error') ?? 'Request failed.' }}</p>
                </div>

                <button @click="show = false" class="text-error/20 hover:text-error transition-colors p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="absolute bottom-0 left-0 h-[3px] bg-gradient-to-r from-error/50 to-error transition-all duration-100 ease-linear"
                    :style="'width: ' + progress + '%'"></div>
            </div>
            @endif
        </div>
        @endif

        <main>
            @yield('content')
        </main>

        @if(!request()->routeIs('dashboard*'))
            @include('components.footer')
        @endif

        <button id="back-to-top"
                class="fixed bottom-10 right-10 w-14 h-14 rounded-[1.5rem] bg-surface/20 border border-white/10 backdrop-blur-2xl text-primary flex items-center justify-center opacity-0 pointer-events-none transition-all duration-700 z-[100] group overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.2)]">

            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 via-transparent to-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

            <div class="absolute inset-0 translate-y-full group-hover:translate-y-0 bg-primary transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)]"></div>

            <div class="relative z-10 flex flex-col items-center">
                <svg class="w-6 h-6 transform group-hover:-translate-y-1 group-hover:text-surface transition-all duration-500 ease-out"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M5 15l7-7 7 7"/>
                </svg>
                <div class="w-1 h-1 rounded-full bg-surface mt-1 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            <div class="absolute inset-0 rounded-[1.5rem] shadow-[0_0_30px_rgba(var(--color-primary-rgb),0.3)] opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
        </button>
    </div>

    <script>
        gsap.registerPlugin(ScrollTrigger, TextPlugin);

        const btt = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            const isVisible = window.scrollY > 400;
            gsap.to(btt, {
                y: isVisible ? 0 : 40,
                opacity: isVisible ? 1 : 0,
                scale: isVisible ? 1 : 0.8,
                duration: 0.8,
                ease: "elastic.out(1, 0.75)",
                pointerEvents: isVisible ? 'auto' : 'none'
            });
        });

        btt.addEventListener('click', () => {
            gsap.to(window, { duration: 1.5, scrollTo: 0, ease: "power4.inOut" });
        });

        const canvas = document.getElementById('matrix-canvas');
        const ctx = canvas.getContext('2d');
        let w, h, cols, drops;
        const charArray = '01'.split('');

        function initMatrix() {
            w = canvas.width = window.innerWidth;
            h = canvas.height = window.innerHeight;
            cols = Math.floor(w / 25) + 1;
            drops = Array(cols).fill(0).map(() => Math.random() * -50);
        }
        initMatrix();
        window.addEventListener('resize', initMatrix);

        function drawMatrix() {
            ctx.fillStyle = 'rgba(10, 10, 15, 0.15)';
            ctx.fillRect(0, 0, w, h);

            ctx.font = '12px Inter';
            for (let i = 0; i < drops.length; i++) {
                const text = charArray[Math.floor(Math.random() * charArray.length)];
                const x = i * 25;
                const y = drops[i] * 25;

                const gradient = ctx.createLinearGradient(x, y - 20, x, y);
                gradient.addColorStop(0, 'rgba(6, 182, 212, 0)');
                gradient.addColorStop(1, 'rgba(6, 182, 212, 0.4)');

                ctx.fillStyle = gradient;
                ctx.fillText(text, x, y);

                if (y > h && Math.random() > 0.98) drops[i] = 0;
                drops[i] += 0.5;
            }
        }
        const matrixInterval = setInterval(drawMatrix, 40);

        const terminalLogs = [
            { text: "> SYSTEM_CHECK: Liquid Core v2.0.4", delay: 50 },
            { text: "> ACCELERATING_NEURAL_PROCESSING...", delay: 200 },
            { text: "> CALIBRATING_HYDRO_VISION_ASSETS", delay: 150, status: "[READY]" },
            { text: "> WARN: ARKHE_PNEUMA_OVERFLOW", delay: 300, status: "[BYPASSED]", class: "warn" },
            { text: "> INJECTING_ELEGANCE_PROTOCOL_7G", delay: 200, status: "[STABLE]" },
            { text: "\"Justice is but a drop in the ocean of code.\"", delay: 600, isQuote: true },
            { text: "> STAGE_READY: AWAITING_COMMAND", delay: 500 }
        ];

        window.addEventListener('load', () => {
            const out = document.getElementById('term-output');
            const pct = document.getElementById('term-pct');
            const bar = document.getElementById('term-bar-fill');
            const preloader = document.getElementById('matrix-preloader');

            let logIndex = 0;
            function runSequence() {
                if (logIndex >= terminalLogs.length) {
                    gsap.to(bar, { width: '100%', duration: 1, ease: "expo.inOut" });
                    pct.textContent = '100%';

                    setTimeout(() => {
                        gsap.to('#terminal-panel', {
                            filter: "blur(20px)",
                            scale: 1.1,
                            opacity: 0,
                            duration: 1,
                            ease: "power4.inOut"
                        });
                        gsap.to(preloader, {
                            opacity: 0,
                            duration: 1.2,
                            onComplete: () => {
                                preloader.style.display = 'none';
                                document.body.style.overflow = '';
                                document.dispatchEvent(new CustomEvent('preloaderDone'));
                            }
                        });
                    }, 800);
                    return;
                }

                const log = terminalLogs[logIndex];
                const div = document.createElement('div');
                div.className = 'log-line opacity-0 translate-y-2';

                if (log.isQuote) {
                    div.innerHTML = `<span class="text-primary italic opacity-60">${log.text}</span>`;
                } else {
                    const statusHtml = log.status ? `<span class="ml-auto text-[10px] ${log.class || 'text-primary'}">${log.status}</span>` : '';
                    div.innerHTML = `<span class="opacity-40 font-mono">SYS_</span><span>${log.text}</span> ${statusHtml}`;
                }

                out.appendChild(div);
                out.scrollTop = out.scrollHeight;

                gsap.to(div, { opacity: 1, y: 0, duration: 0.4 });

                let currentPct = Math.floor((logIndex / terminalLogs.length) * 100);
                gsap.to(bar, { width: currentPct + '%', duration: 0.5 });
                pct.textContent = currentPct + '%';

                logIndex++;
                setTimeout(runSequence, log.delay);
            }
            setTimeout(runSequence, 500);
        });

        const glow = document.getElementById('cursor-glow');
        const dot = document.getElementById('cursor-dot');

        document.addEventListener('mousemove', (e) => {
            gsap.to(glow, { x: e.clientX, y: e.clientY, duration: 1.2, ease: "power3.out" });
            gsap.to(dot, { x: e.clientX, y: e.clientY, duration: 0.2, ease: "power2.out" });
        });

        document.addEventListener('preloaderDone', () => {
            gsap.utils.toArray('.gsap-reveal').forEach(el => {
                gsap.fromTo(el,
                    { y: 60, opacity: 0, filter: "blur(10px)" },
                    {
                        scrollTrigger: { trigger: el, start: 'top 85%' },
                        y: 0,
                        opacity: 1,
                        filter: "blur(0px)",
                        duration: 1.5,
                        ease: "expo.out"
                    }
                );
            });

            gsap.utils.toArray('.gsap-stagger').forEach(container => {
                gsap.fromTo(container.children,
                    { y: 40, opacity: 0, scale: 0.95 },
                    {
                        scrollTrigger: { trigger: container, start: 'top 85%' },
                        y: 0,
                        opacity: 1,
                        scale: 1,
                        duration: 1,
                        stagger: 0.1,
                        ease: "power4.out"
                    }
                );
            });
        });
    </script>

    <script>
        const backToTop = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-10');
                backToTop.classList.add('opacity-100', 'pointer-events-all', 'translate-y-0');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none', 'translate-y-10');
                backToTop.classList.remove('opacity-100', 'pointer-events-all', 'translate-y-0');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <script>
        const root = document.documentElement;
        const toggleBtn = document.getElementById('theme-toggle');
        const icon = document.getElementById('theme-icon');

        function applyTheme(theme) {
            if (theme === 'dark') {
                root.classList.add('theme-dark');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                root.classList.remove('theme-dark');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        }

        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);

        toggleBtn.addEventListener('click', () => {
            const isDark = root.classList.contains('theme-dark');
            const newTheme = isDark ? 'light' : 'dark';

            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
        });
    </script>
</body>
</html>
