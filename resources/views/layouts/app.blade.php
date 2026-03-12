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

        /* ═══ MATRIX PRELOADER STYLES ═══ */
        #matrix-preloader {
            position: fixed; inset: 0; z-index: 10000;
            background: #000;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            overflow: hidden;
            font-family: 'Inter', monospace;
        }
        #matrix-preloader.fade-out {
            pointer-events: none !important;
            z-index: -1 !important;
        }
        [x-cloak] { display: none !important; }

        /* The Canvas for Matrix digital rain */
        #matrix-canvas {
            position: absolute; inset: 0;
            width: 100%; height: 100%;
            z-index: 1; pointer-events: none !important;
            opacity: 0.85; 
        }

        /* Overlay to darken edge / center for the console */
        .matrix-overlay {
            position: absolute; inset: 0;
            background: radial-gradient(circle at center, rgba(0,0,0,0.3) 0%, rgba(2,6,23,0.9) 100%);
            z-index: 2; pointer-events: none;
        }

        /* Center Terminal Panel */
        .terminal-panel {
            position: relative; z-index: 10;
            max-width: 600px; width: 90%;
            padding: 3rem;
            background: rgba(4, 14, 30, 0.65);
            backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 211, 238, 0.2);
            border-radius: 0.5rem;
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.15), inset 0 0 20px rgba(6, 182, 212, 0.05);
        }

        /* Corner accents for the terminal */
        .terminal-panel::before, .terminal-panel::after {
            content: ''; position: absolute; width: 20px; height: 20px;
            border-color: rgba(34, 211, 238, 0.5); pointer-events: none;
        }
        .terminal-panel::before {
            top: -1px; left: -1px;
            border-top: 2px solid; border-left: 2px solid;
            border-top-left-radius: 0.5rem;
        }
        .terminal-panel::after {
            bottom: -1px; right: -1px;
            border-bottom: 2px solid; border-right: 2px solid;
            border-bottom-right-radius: 0.5rem;
        }

        .terminal-header {
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid rgba(34, 211, 238, 0.15);
            padding-bottom: 1rem; margin-bottom: 1.5rem;
        }

        .terminal-title {
            font-family: 'Cinzel', serif;
            font-size: 1.25rem; font-weight: 700;
            color: #22d3ee; letter-spacing: 0.15em;
            text-shadow: 0 0 10px rgba(34, 211, 238, 0.4);
            display: flex; align-items: center; gap: 0.75rem;
        }

        .blinker-block {
            width: 12px; height: 18px; background: #67e8f9;
            box-shadow: 0 0 10px #67e8f9;
        }

        .terminal-version {
            font-size: 0.65rem; color: rgba(34, 211, 238, 0.5);
            letter-spacing: 0.2em; font-family: monospace;
        }

        /* Logs Output */
        .terminal-output {
            display: flex; flex-direction: column; gap: 0.6rem;
            min-height: 180px; max-height: 250px; overflow-y: hidden;
            font-family: 'Inter', monospace; font-size: 0.8rem;
            color: rgba(165, 243, 252, 0.85); /* a5f3fc */
            text-shadow: 0 0 4px rgba(34, 211, 238, 0.2);
            position: relative;
        }

        .log-line {
            line-height: 1.4; opacity: 0;
            transform: translateY(8px);
        }

        .log-prefix { color: #0891b2; margin-right: 0.5rem; }
        .log-status { float: right; font-weight: 600; font-size: 0.7rem; letter-spacing: 0.1em; }
        .log-status.ok { color: #34d399; }
        .log-status.warn { color: #fbbf24; }
        .log-status.err { color: #f87171; }

        /* Highlight special Furina quotes in blue */
        .quote-line { color: #818cf8; font-style: italic; font-family: 'Playfair Display', serif; font-size: 0.95rem; }

        /* Progress Bar */
        .terminal-progress-container {
            margin-top: 2rem;
        }
        .progress-text-row {
            display: flex; justify-content: space-between; align-items: flex-end;
            margin-bottom: 0.5rem; font-size: 0.7rem; color: #67e8f9;
        }
        .progress-bar-wrapper {
            width: 100%; height: 4px; background: rgba(34, 211, 238, 0.1);
            position: relative; overflow: hidden; border-radius: 2px;
        }
        .progress-bar-fill {
            height: 100%; width: 0%;
            background: #22d3ee;
            box-shadow: 0 0 15px #22d3ee, 0 0 5px #fff;
        }
        
        /* ScanLine effect over the whole preloader */
        .global-scanline {
            position: absolute; inset: 0; pointer-events: none; z-index: 50;
            background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,0) 50%, rgba(34,211,238,0.1) 50%, rgba(34,211,238,0.1));
            background-size: 100% 4px; opacity: 0.3;
        }
        .scanbar {
            position: absolute; left: 0; right: 0; height: 10px; top: -10px; z-index: 51; pointer-events: none;
            background: linear-gradient(to bottom, transparent, rgba(6,182,212,0.4), transparent);
            box-shadow: 0 0 20px rgba(34,211,238,0.3);
            animation: scankey 4s linear infinite;
        }
        @keyframes scankey {
            0% { top: -10px; }
            100% { top: 100%; }
        }

        /* Final Fade Out */
        .fade-out { opacity: 0 !important; visibility: hidden; transition: all 1s ease; }

        @media (max-width: 480px) {
            .terminal-panel { padding: 1.5rem; }
            .terminal-output { min-height: 140px; font-size: 0.7rem; }
        }
    </style>
</head>
<body class="{{ !request()->routeIs('dashboard*') ? 'bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col' : 'bg-[#050f2e] text-white min-h-screen' }}">
    <div class="{{ !request()->routeIs('dashboard*') ? 'flex-grow flex flex-col' : '' }}">
    {{-- Matrix / Terminal Preloader --}}
    <div id="matrix-preloader">
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
                <!-- Logs will be inserted via JS -->
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

        {{-- Flash Messages --}}
        @if(session('success') || session('error'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)"
             class="fixed top-24 right-8 z-[100] max-w-sm w-full"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full opacity-0"
             x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="translate-x-0 opacity-100"
             x-transition:leave-end="translate-x-full opacity-0">
            
            @if(session('success'))
            <div class="p-4 rounded-2xl bg-[#0a1a48]/80 border border-cyan-400/30 backdrop-blur-xl shadow-2xl flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-400/10 flex items-center justify-center text-cyan-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-white uppercase tracking-wider">Protocol Success</p>
                    <p class="text-[11px] text-blue-200/60 mt-0.5">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-blue-200/20 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            @endif

            @if(session('error') || $errors->any())
            <div class="p-4 rounded-2xl bg-red-950/80 border border-red-500/30 backdrop-blur-xl shadow-2xl flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-white uppercase tracking-wider">System Exception</p>
                    <p class="text-[11px] text-red-200/60 mt-0.5">{{ session('error') ?? 'Validation failed.' }}</p>
                </div>
                <button @click="show = false" class="text-red-200/20 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            @endif
        </div>
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

        // ═══ MATRIX DIGITAL RAIN SCRIPT ═══
        const canvas = document.getElementById('matrix-canvas');
        const ctx = canvas.getContext('2d');
        let w, h, cols, drops;

        // Custom characters (Katakana + Numbers + Specific Alphabet)
        const katakana = 'アァカサタナハマヤャラワガザダバパイィキシチニヒミリヰギジヂビピウゥクスツヌフムユュルグズブヅプエェケセテネヘメレゲゼデベペオォコソトノホモヨョロゴゾドボポヴッン';
        const latin = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        const nums = '0123456789';
        const charArray = (katakana + latin + nums).split('');

        function initMatrix() {
            w = canvas.width = window.innerWidth;
            h = canvas.height = window.innerHeight;
            cols = Math.floor(w / 20) + 1;
            drops = Array(cols).fill(0).map(() => Math.random() * -100);
        }
        initMatrix();
        window.addEventListener('resize', initMatrix);

        function drawMatrix() {
            // Semi-transparent black to create trailing effect
            ctx.fillStyle = 'rgba(0, 0, 0, 0.08)';
            ctx.fillRect(0, 0, w, h);

            // Furina Hydro Cyan color: #22d3ee to white
            ctx.font = '15pt Inter, monospace';
            
            for (let i = 0; i < drops.length; i++) {
                const text = charArray[Math.floor(Math.random() * charArray.length)];
                
                // Colors: lead character is white-ish, trailing is cyan
                const x = i * 20;
                const y = drops[i] * 20;

                ctx.fillStyle = '#67e8f9'; // slight cyan tail
                if (Math.random() > 0.95) {
                    ctx.fillStyle = '#ffffff'; // white heads sporadically
                }

                ctx.fillText(text, x, y);

                // Reset drop to top randomly
                if (y > h && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i] += 0.8; // Speed of drop
            }
        }
        const matrixInterval = setInterval(drawMatrix, 50);

        // ═══ TERMINAL BOOT SEQUENCE SCRIPT ═══
        const terminalLogs = [
            { text: "Initiating Oratrice_Mecanique_d'Analyse_Cardinale...", delay: 50 },
            { text: "Connecting to Fontaine Neural Network...", delay: 200, status: "[OK]" },
            { text: "Mounting Hydro vision core protocols...", delay: 150, status: "[OK]" },
            { text: "Warning: Pneuma and Ousia imbalance detected.", delay: 300, status: "[WARN]", class: "warn" },
            { text: "Re-calibrating Arkhe system...", delay: 400, status: "[OK]" },
            { text: "Compiling justice algorithms...", delay: 200, status: "[OK]" },
            { text: "\"Let the world become my stage!\"", delay: 400, isQuote: true },
            { text: "Bypassing heavenly principles (Access: DENIED)", delay: 300, status: "[ERR]", class: "err" },
            { text: "Loading Furina's Macaroni recipes...", delay: 250, status: "[OK]" },
            { text: "Synchronizing aesthetic assets...", delay: 150, status: "[OK]" },
            { text: "\"We shall judge you, as we gather the water!\"", delay: 400, isQuote: true },
            { text: "Environment rendering complete. Awaiting audience...", delay: 500 }
        ];

        window.addEventListener('load', () => {
            const out = document.getElementById('term-output');
            const pct = document.getElementById('term-pct');
            const bar = document.getElementById('term-bar-fill');
            const preloader = document.getElementById('matrix-preloader');
            
            // Blinker toggle
            gsap.to('#term-blinker', { opacity: 0.1, duration: 0.35, repeat: -1, yoyo: true, ease: 'steps(1)' });

            let logIndex = 0;
            let currentPct = 0;

            function runSequence() {
                if (logIndex >= terminalLogs.length) {
                    // Sequence done
                    gsap.to(bar, { width: '100%', duration: 0.5 });
                    pct.textContent = '100%';
                    
                    setTimeout(() => {
                        // Exit animation
                        preloader.classList.add('fade-out');
                        gsap.to('#terminal-panel', { scale: 0.95, opacity: 0, duration: 0.4, ease: 'power3.in' });
                        gsap.to(preloader, { opacity: 0, duration: 0.8, delay: 0.2, ease: 'power2.inOut', onComplete: () => {
                            preloader.style.display = 'none';
                            clearInterval(matrixInterval);
                            document.body.style.overflow = '';
                            document.dispatchEvent(new CustomEvent('preloaderDone'));
                        }});
                    }, 800);
                    return;
                }

                const log = terminalLogs[logIndex];
                const div = document.createElement('div');
                div.className = 'log-line';
                
                if (log.isQuote) {
                    div.innerHTML = `<span class="quote-line">${log.text}</span>`;
                } else {
                    const statusHtml = log.status ? `<span class="log-status ${log.class || 'ok'}">${log.status}</span>` : '';
                    div.innerHTML = `<span class="log-prefix">root@fontaine:~#</span> ${log.text} ${statusHtml}`;
                }

                out.appendChild(div);
                
                // Auto scroll to bottom
                out.scrollTop = out.scrollHeight;

                // Animate entry
                gsap.to(div, { opacity: 1, y: 0, duration: 0.2, ease: 'power1.out' });

                // Update Progress
                currentPct += Math.floor(100 / terminalLogs.length);
                if (currentPct > 99) currentPct = 99; // Cap until end
                gsap.to(bar, { width: currentPct + '%', duration: 0.3 });
                pct.textContent = currentPct + '%';

                logIndex++;
                setTimeout(runSequence, log.delay);
            }

            // Start sequence
            setTimeout(runSequence, 300);
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



        // Counters
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count);
            ScrollTrigger.create({
                trigger: el, start: 'top 92%',
                onEnter: () => {
                    let obj = { val: 0 };
                    gsap.to(obj, {
                        val: target, duration: 2, ease: 'power2.out',
                        onUpdate() { el.textContent = Math.round(obj.val) + (el.dataset.suffix || ''); }
                    });
                }
            });
        });
    </script>
    </div>
</body>
</html>