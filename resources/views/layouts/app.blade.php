<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth theme-dark dark">
<head>
    <meta charset="utf-8">
    {{-- Dark Mode FOUC Fix: runs before CSS renders to prevent white-flash --}}
    <script>
        (function(){
            var t = localStorage.getItem('theme') || 'dark';
            document.documentElement.className = 'scroll-smooth theme-' + t + (t === 'dark' ? ' dark' : '');
        })();
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Search Engine Optimization --}}
    <meta name="description" content="{{ $settings['hero_bio'] ?? 'Fahri Noor Royyan — Laravel Web Developer Portfolio. Elegant Furina-inspired aesthetics from Fontaine.' }}">
    <meta name="keywords" content="Fahri Noor Royyan, Laravel Developer, Web Developer, Portfolio, Fontaine Theme, UI/UX, Full-Stack">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Fahri Noor Royyan' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['hero_name'] ?? 'Fahri' }} | Professional Portfolio">
    <meta property="og:description" content="{{ $settings['hero_bio'] ?? 'Membangun jembatan antara imajinasi dan realitas digital.' }}">
    <meta property="og:image" content="{{ url('/photo-profile.jpeg') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $settings['hero_name'] ?? 'Fahri' }} | Professional Portfolio">
    <meta property="twitter:description" content="{{ $settings['hero_bio'] ?? 'Membangun jembatan antara imajinasi dan realitas digital.' }}">
    <meta property="twitter:image" content="{{ url('/photo-profile.jpeg') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <title>{{ $settings['hero_name'] ?? 'Fahri' }} | @yield('title', 'Portfolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Cloudflare Turnstile (Anti-Spam) - loaded only when keys are configured --}}
    @if(config('services.turnstile.site_key') && config('services.turnstile.site_key') !== 'YOUR_TURNSTILE_SITE_KEY')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endif

    {{-- Google Analytics GA4 (only on production) --}}
    @if(app()->isProduction() && config('services.google_analytics.id') && config('services.google_analytics.id') !== 'G-XXXXXXXXXX')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.id') }}', { 'send_page_view': false });
        window._gaId = '{{ config('services.google_analytics.id') }}';
    </script>
    @endif

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Swup SPA Transitions */
        .transition-fade { transition: 0.5s; opacity: 1; }
        html.is-animating .transition-fade { opacity: 0; transform: translateY(20px); }
    </style>

    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Cloudflare Web Analytics (privacy-friendly, no cookies, no GDPR banner needed) --}}
    @if(config('services.cloudflare_analytics.token') && config('services.cloudflare_analytics.token') !== 'YOUR_CF_TOKEN')
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
            data-cf-beacon='{"token": "{{ config('services.cloudflare_analytics.token') }}"}'>
    </script>
    @endif
</head>
<body class="{{ !request()->routeIs('dashboard*') ? 'bg-bg text-text min-h-screen flex flex-col' : 'bg-[#050f2e] text-white min-h-screen' }}">
    {{-- Global Cinematic Noise Overlay --}}
    @if(!request()->routeIs('dashboard*'))
    <svg id="global-noise" class="hidden">
        <filter id="cinematic-noise">
            <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/>
        </filter>
    </svg>
    <div class="fixed inset-0 pointer-events-none z-[9998] opacity-[0.03] mix-blend-overlay" style="filter: url(#cinematic-noise);"></div>
    @endif

    <div class="{{ !request()->routeIs('dashboard*') ? 'flex-grow flex flex-col' : '' }}">

    {{-- TV Power On Effect Overlay (Global Loading phase 1) --}}
    <div id="tv-power-on" class="fixed inset-0 z-[10000] bg-black flex items-center justify-center pointer-events-none">
        <div id="tv-line" class="bg-white h-[2px] w-0 shadow-[0_0_50px_10px_rgba(255,255,255,0.5)] opacity-0 rounded-full"></div>
    </div>

    {{-- Interactive Splash Screen (Brutalist Retro CRT) --}}
    <div id="fnr-preloader" class="fixed inset-0 z-[9999] bg-[#E8E9F3] flex flex-col justify-center overflow-hidden transition-all duration-1000 ease-[cubic-bezier(0.87,0,0.13,1)]">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');
            .font-vt323 { font-family: 'VT323', monospace; }
            .crt-container { perspective: 1200px; }
            .crt-monitor {
                background: #c3c4ca; border-radius: 3rem;
                box-shadow: inset -5px -5px 15px rgba(255,255,255,0.7), inset 10px 10px 20px rgba(0,0,0,0.1), 30px 40px 60px rgba(0,0,0,0.2), -10px -10px 30px rgba(255,255,255,1);
                border: 2px solid #ddd; transform-style: preserve-3d; transition: transform 0.5s;
            }
            .crt-container:hover .crt-monitor { transform: rotateX(2deg) rotateY(-2deg); }
            .crt-bezel { background: #111; border-radius: 2rem; box-shadow: inset 0 0 20px #000; }
            .crt-screen { background: #0000b3; border-radius: 1.5rem; box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.8); position: relative; overflow: hidden; }
            .crt-screen::before {
                content: " "; display: block; position: absolute; inset: 0;
                background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
                z-index: 0; background-size: 100% 3px, 3px 100%; pointer-events: none;
            }
            .crt-screen::after {
                content: " "; display: block; position: absolute; inset: 0;
                background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 50%, rgba(255,255,255,0.05) 100%);
                z-index: 0; border-radius: 1.5rem; pointer-events: none;
            }
            @keyframes crtFlicker { 0% { opacity: 0.95; } 5% { opacity: 0.85; } 10% { opacity: 0.95; } 15% { opacity: 1; } 100% { opacity: 1; } }
            /* isolation:isolate removed — it caused a new stacking context that blocked pointer-events on buttons */
            .crt-content { animation: crtFlicker 4s infinite alternate; position: relative; z-index: 1; }
            .crt-btn { position: relative; z-index: 100; }
            .animate-blink { animation: blink 1s step-end infinite; }
            @keyframes blink { 50% { opacity: 0; } }
        </style>

        {{-- Huge Background Marquee/Text --}}
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0 overflow-hidden mix-blend-multiply opacity-5">
            <h1 class="text-[18vw] font-black text-[#0000ff] leading-none tracking-tighter whitespace-nowrap">
                PORTFOLIO PORTFOLIO
            </h1>
        </div>

        {{-- Corner Labels --}}
        <div class="absolute top-10 left-6 md:left-12 z-20 font-inter font-bold text-sm md:text-2xl text-[#0000ff] tracking-tighter uppercase">
            {{ $settings['hero_name'] ?? 'Fahri Noor Royyan' }}
        </div>
        <div class="absolute top-10 right-6 md:right-12 z-20 font-inter font-bold text-sm md:text-2xl text-[#0000ff] tracking-tighter text-right uppercase">
            {{ $settings['hero_tagline'] ?? 'Multidisciplinary Developer' }}
        </div>

        <div class="relative z-10 w-full max-w-5xl mx-auto px-4 lg:px-8 mt-12 md:mt-0">
            {{-- CRT Monitor --}}
            <div class="crt-container w-full" id="crt-enter-btn">
                <div class="crt-monitor mx-auto w-full md:w-[85%] lg:w-[800px] aspect-[4/5] sm:aspect-square md:aspect-[16/11] p-4 sm:p-8 md:p-12 relative hover:scale-[1.02]">
                    <div class="absolute top-2 left-1/2 -translate-x-1/2 w-40 h-2 flex justify-between gap-1 opacity-20 hidden md:flex">
                        @for($i=0; $i<8; $i++) <div class="h-full w-2 bg-black rounded-sm"></div> @endfor
                    </div>
                    <div class="crt-bezel w-full h-full p-2 sm:p-4 md:p-6 relative">
                        <div class="crt-screen w-full h-full flex flex-col items-center justify-center p-3 sm:p-6 md:p-10">
                            <div class="crt-content relative z-10 flex flex-col items-center justify-center w-full h-full">

                                <!-- Boot Sequence -->
                                <div id="crt-boot-sequence" class="absolute inset-0 flex flex-col justify-start text-left items-start p-4 md:p-8 font-vt323 text-white/90 text-xs sm:text-sm md:text-xl tracking-widest w-full z-20">
                                    <div id="boot-text-1" class="opacity-0 mb-1">BIOS ROM FNR-CORE v2.0</div>
                                    <div id="boot-text-2" class="opacity-0 mb-1">Copyright (C) {{ date('Y') }}, Fahri Noor Royyan</div>
                                    <div class="mb-4"></div>
                                    <div id="boot-text-3" class="opacity-0 mb-1 text-white/70">Main Processor : MULTICORE WEB CPU</div>
                                    <div id="boot-text-4" class="opacity-0 mb-1 text-white/70">Memory Testing : <span id="boot-mem">0</span>K OK</div>
                                    <div class="mb-4"></div>
                                    <div id="boot-text-5" class="opacity-0 mb-1 text-yellow-300">Initializing Display... [OK]</div>
                                    <div id="boot-text-6" class="opacity-0 mb-1 text-green-400 hidden">Loading Assets... <span id="boot-percent">0%</span></div>
                                    <div id="boot-cursor" class="mt-2 text-white animate-blink opacity-0">_</div>
                                </div>

                                <!-- Main Menu -->
                                <div id="crt-main-menu" class="flex flex-col items-center justify-center space-y-2 sm:space-y-4 md:space-y-8 w-full h-full opacity-0 relative z-10">
                                    <pre class="hidden sm:block font-vt323 text-white text-[8px] sm:text-[14px] md:text-xl lg:text-2xl leading-none md:leading-[1.1] text-center font-bold tracking-widest drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] mt-1">
  ___ _  _ ___  
 | __| \| | _ \ 
 | _|| .` |   / 
 |_| |_|\_|_|_\ 
                                    </pre>
                                    <h1 class="block sm:hidden font-vt323 text-white text-3xl font-bold tracking-widest drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] text-center w-full mb-2">FAHRI OS</h1>
                                    <div class="font-vt323 text-white/90 text-[10px] sm:text-xs md:text-base lg:text-xl tracking-widest text-center space-y-2 md:space-y-4 w-full max-w-sm">
                                        <p class="mb-1 md:mb-2 font-bold border-b border-white/20 pb-1 md:pb-2 text-[10px] md:text-base">MULTIDISCIPLINARY DEVELOPER</p>
                                        <div class="text-left space-y-1 sm:space-y-2 pl-4 sm:pl-16 md:pl-8">
                                            <div class="grid grid-cols-[80px_1fr] md:grid-cols-[120px_1fr] gap-1"><span class="text-white/60">NAME:</span><span class="text-white bg-white/10 px-1 py-0.5 rounded leading-none">{{ strtoupper($settings['hero_name'] ?? 'FAHRI') }}</span></div>
                                            <div class="grid grid-cols-[80px_1fr] md:grid-cols-[120px_1fr] gap-1"><span class="text-white/60">DATE:</span><span class="text-white leading-none">{{ date('Y') }}</span></div>
                                            <div class="grid grid-cols-[80px_1fr] md:grid-cols-[120px_1fr] gap-1"><span class="text-white/60">OPERATOR:</span><span class="text-white leading-none truncate">FULL-STACK WEB</span></div>
                                        </div>
                                        <!-- CRT Interactive Menu -->
                                        <div id="crt-menu-options" class="mt-2 md:mt-4 flex flex-col items-center space-y-1 transition-opacity w-full" style="opacity:0.5; pointer-events:none;">
                                            <p id="crt-msg-wait" class="text-yellow-300 animate-blink uppercase text-[10px] md:text-sm">&lt;Wait For Boot Sequence&gt;</p>
                                            <div id="crt-msg-ready" class="flex-col items-center gap-2 w-full max-w-xs bg-black/40 p-3 rounded border border-white/20 relative" style="display:none; z-index:100; pointer-events:auto; position:relative;">
                                                <button type="button" id="btn-enter" class="crt-btn w-full text-center px-4 py-3 text-yellow-300 hover:bg-white hover:text-[#0000b3] border border-white/30 outline-none transition-all uppercase font-bold text-xs md:text-sm rounded shadow-[0_0_10px_rgba(253,224,71,0.2)]" style="display:block; width:100%; cursor:pointer; position:relative; z-index:100;">
                                                    &gt; 1. PORTFOLIO OS &lt;
                                                </button>
                                                <button type="button" id="btn-game" class="crt-btn w-full text-center px-4 py-3 text-cyan-300 hover:bg-cyan-400 hover:text-[#0000b3] border border-cyan-400/40 outline-none transition-all uppercase font-bold text-xs md:text-sm rounded shadow-[0_0_10px_rgba(34,211,238,0.25)]" style="display:block; width:100%; cursor:pointer; position:relative; z-index:100; margin-top:0.5rem;">
                                                    &gt; 2. ACTION RPG &lt;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Retro Minigame Container -->
                                <div id="crt-game-container" class="absolute inset-0 hidden flex-col items-center justify-center p-2 z-30 bg-[#0000b3] overflow-hidden rounded-xl">
                                    <div class="w-full max-w-[400px] flex justify-between text-white font-vt323 text-xs md:text-base mb-1 px-1">
                                        <span id="game-score">SCORE: 000</span>
                                        <span id="game-hp" class="text-red-400">HP: 100%</span>
                                    </div>
                                    <canvas id="retro-game-canvas" width="400" height="300" class="w-full max-w-[400px] bg-[#0a0f12] border-2 border-white/20 aspect-[4/3] block shadow-[inset_0_0_20px_rgba(34,211,238,0.1)]"></canvas>
                                    <p class="hidden md:block text-white/60 text-[8px] md:text-[10px] font-vt323 mt-1 text-center uppercase tracking-widest leading-tight">
                                        [WASD/Arrows] Move &nbsp;|&nbsp; [SPACE] Attack &nbsp;|&nbsp; [ESC] Quit
                                    </p>

                                    {{-- Mobile Touch Gamepad --}}
                                    <div id="mobile-gamepad" class="w-full max-w-[400px] mt-2 px-2 md:hidden select-none" style="touch-action:none;">
                                        <style>
                                            .gp-btn { -webkit-tap-highlight-color: transparent; touch-action: none; user-select: none; }
                                            .gp-btn:active { filter: brightness(1.5); transform: scale(0.92); }
                                        </style>
                                        <div class="flex justify-between items-center gap-2">

                                            {{-- D-Pad (Left) --}}
                                            <div class="relative flex-shrink-0" style="width:108px;height:108px;">
                                                {{-- Up --}}
                                                <button id="gp-up" class="gp-btn absolute flex items-center justify-center bg-white/10 border border-white/30 rounded text-white font-bold text-lg transition-all"
                                                    style="width:36px;height:36px;top:0;left:50%;transform:translateX(-50%);">▲</button>
                                                {{-- Left --}}
                                                <button id="gp-left" class="gp-btn absolute flex items-center justify-center bg-white/10 border border-white/30 rounded text-white font-bold text-lg transition-all"
                                                    style="width:36px;height:36px;left:0;top:50%;transform:translateY(-50%);">◀</button>
                                                {{-- Center (decorative) --}}
                                                <div class="absolute bg-white/5 border border-white/15 rounded"
                                                    style="width:36px;height:36px;top:50%;left:50%;transform:translate(-50%,-50%);"></div>
                                                {{-- Right --}}
                                                <button id="gp-right" class="gp-btn absolute flex items-center justify-center bg-white/10 border border-white/30 rounded text-white font-bold text-lg transition-all"
                                                    style="width:36px;height:36px;right:0;top:50%;transform:translateY(-50%);">▶</button>
                                                {{-- Down --}}
                                                <button id="gp-down" class="gp-btn absolute flex items-center justify-center bg-white/10 border border-white/30 rounded text-white font-bold text-lg transition-all"
                                                    style="width:36px;height:36px;bottom:0;left:50%;transform:translateX(-50%);">▼</button>
                                            </div>

                                            {{-- Center: Quit button --}}
                                            <div class="flex flex-col items-center gap-2 flex-1">
                                                <span class="font-vt323 text-white/25 text-[8px] uppercase tracking-widest">CTRL</span>
                                                <button id="gp-quit-mobile" class="gp-btn px-3 py-1 bg-red-500/20 border border-red-500/40 rounded font-vt323 text-red-400 text-[10px] uppercase transition-all">
                                                    QUIT
                                                </button>
                                            </div>

                                            {{-- Attack Button (Right) --}}
                                            <div class="flex-shrink-0 flex flex-col items-center gap-1">
                                                <button id="gp-attack" class="gp-btn flex items-center justify-center bg-cyan-400/20 border-2 border-cyan-400/60 rounded-full font-vt323 text-cyan-300 uppercase font-bold transition-all shadow-[0_0_20px_rgba(34,211,238,0.25)]"
                                                    style="width:68px;height:68px;font-size:13px;">
                                                    FIRE
                                                </button>
                                                <span class="font-vt323 text-cyan-400/40 text-[8px] uppercase tracking-widest">SPACE</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Game Over Overlay -->
                                    <div id="game-over-screen" class="absolute inset-0 flex flex-col items-center justify-center bg-[#0000b3]/90 backdrop-blur-sm hidden z-40">
                                        <h2 class="text-red-500 font-vt323 text-2xl md:text-4xl animate-blink mb-4 drop-shadow-[0_0_10px_red]">SYSTEM FAILURE</h2>
                                        <p class="text-white font-vt323 text-sm md:text-xl mb-6">FINAL SCORE: <span id="game-final-score">0</span></p>
                                        <button id="btn-restart" class="font-vt323 text-xs md:text-base px-4 py-2 bg-white text-[#0000b3] hover:bg-red-500 hover:text-white transition-colors uppercase outline-none focus:ring-2 ring-white">Restart [R]</button>
                                        <button id="btn-quit" class="font-vt323 text-[10px] md:text-sm mt-3 text-white/50 hover:text-white uppercase outline-none focus:text-white">Quit to OS [ESC]</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center font-bold text-[#0000ff] opacity-50 text-[10px] sm:text-xs mt-4 sm:mt-6 tracking-widest uppercase md:hidden relative z-20">Tap to continue</p>
            </div>
        </div>
    </div>

    {{-- Custom cursor removed --}}

    {{-- <div class="orb" style="width:600px;height:600px;background:rgba(6,182,212,0.06);top:-15%;right:-10%;z-index:-1;"></div>
    <div class="orb" style="width:500px;height:500px;background:rgba(8,145,178,0.04);bottom:5%;left:-10%;z-index:-1;"></div>
    <div id="tsparticles" style="position:fixed;inset:0;z-index:-2;pointer-events:none;"></div> --}}

    <div class="relative min-h-screen">
        @if(!request()->routeIs('dashboard*'))
            @include('components.navbar')
        @endif

        {{-- Dynamic Alpine.js Toast Notifications --}}
        <div id="toast-container" class="fixed top-24 right-6 z-[100] max-w-[320px] w-full px-4 flex flex-col gap-4 pointer-events-none"
             x-data="{ 
                 toasts: [],
                 addToast(type, message) {
                     let id = Date.now();
                     this.toasts.push({ id, type, message, show: false, progress: 100 });
                     
                     // Animate in
                     setTimeout(() => {
                         let t = this.toasts.find(t => t.id === id);
                         if(t) t.show = true;
                     }, 50);

                     // Progress timer
                     let timer = setInterval(() => {
                         let t = this.toasts.find(t => t.id === id);
                         if (!t) {
                             clearInterval(timer);
                             return;
                         }
                         t.progress -= 1; // 5000ms total
                         if (t.progress <= 0) {
                             clearInterval(timer);
                             this.removeToast(id);
                         }
                     }, 50);
                 },
                 removeToast(id) {
                     let t = this.toasts.find(t => t.id === id);
                     if(t) t.show = false;
                     // Wait for leave animation
                     setTimeout(() => {
                         this.toasts = this.toasts.filter(toast => toast.id !== id);
                     }, 500);
                 }
             }"
             @notify.window="addToast($event.detail.type, $event.detail.message)"
             x-init="
                @if(session('success')) addToast('success', {{ \Illuminate\Support\Js::from(session('success')) }}); @endif
                @if(session('error')) addToast('error', {{ \Illuminate\Support\Js::from(session('error')) }}); @endif
                @if($errors->any()) addToast('error', {{ \Illuminate\Support\Js::from($errors->first()) }}); @endif
             ">
             <template x-for="toast in toasts" :key="toast.id">
                 <div class="relative group overflow-hidden rounded-[2rem] bg-surface/40 backdrop-blur-3xl border shadow-lg p-5 flex items-center gap-4 transition-all duration-500 transform pointer-events-auto"
                      :class="[
                          toast.type === 'success' ? 'border-success/20 shadow-[0_20px_40px_rgba(var(--color-success-rgb),0.1)]' : 'border-error/20 shadow-[0_20px_40px_rgba(var(--color-error-rgb),0.1)]',
                          toast.show ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0'
                      ]">
                     <!-- Glow -->
                     <div class="absolute -right-10 -top-10 w-32 h-32 blur-[40px] rounded-full"
                          :class="toast.type === 'success' ? 'bg-success/10' : 'bg-error/10'"></div>

                     <!-- Icon -->
                     <div class="shrink-0 w-12 h-12 rounded-2xl border flex items-center justify-center shadow-inner"
                          :class="toast.type === 'success' ? 'bg-success/10 border-success/20 text-success' : 'bg-error/10 border-error/20 text-error'">
                         <svg class="w-6 h-6" :class="toast.type === 'success' ? 'drop-shadow-[0_0_8px_rgba(var(--color-success-rgb),0.5)]' : 'drop-shadow-[0_0_8px_rgba(var(--color-error-rgb),0.5)]'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path x-show="toast.type === 'success'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                             <path x-show="toast.type !== 'success'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                         </svg>
                     </div>

                     <!-- Text -->
                     <div class="flex-1">
                         <h4 class="text-[10px] font-black uppercase tracking-[0.3em] opacity-80"
                             :class="toast.type === 'success' ? 'text-text' : 'text-error'" x-text="toast.type === 'success' ? 'System.Success' : 'System.Exception'"></h4>
                         <p class="text-xs font-medium text-text/90 mt-1 leading-relaxed" x-text="toast.message"></p>
                     </div>

                     <!-- Close -->
                     <button @click="removeToast(toast.id)" class="transition-colors p-1"
                             :class="toast.type === 'success' ? 'text-text/20 hover:text-primary' : 'text-error/20 hover:text-error'">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                     </button>

                     <!-- Progress Bar -->
                     <div class="absolute bottom-0 left-0 h-[3px] transition-all duration-100 ease-linear"
                          :class="toast.type === 'success' ? 'bg-gradient-to-r from-success/50 to-success' : 'bg-gradient-to-r from-error/50 to-error'"
                          :style="'width: ' + toast.progress + '%'"></div>
                 </div>
             </template>
        </div>

        <main id="swup" class="transition-fade">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        @if(!request()->routeIs('dashboard*'))
            @include('components.footer')
        @endif

        <button id="back-to-top" aria-label="Scroll back to top"
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

    {{-- Main logic is now in resources/js/app.js --}}

    {{-- ═══════════════════════════════════════════════════
         LOADING SCREEN #1: Language Switch (Globe Style)
    ═══════════════════════════════════════════════════ --}}
    <div id="lang-loader" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center" style="display:none; background: rgba(4,8,20,0.97); backdrop-filter: blur(20px);">
        <style>
            @keyframes langGlobeSpin {
                0%   { transform: rotateY(0deg) scale(1); }
                50%  { transform: rotateY(180deg) scale(1.15); }
                100% { transform: rotateY(360deg) scale(1); }
            }
            @keyframes langFadeUp {
                from { opacity: 0; transform: translateY(24px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            @keyframes langDotBounce {
                0%, 100% { transform: translateY(0); opacity: 0.3; }
                50%      { transform: translateY(-6px); opacity: 1; }
            }
            .lang-loader-card   { animation: langFadeUp 0.5s cubic-bezier(0.23,1,0.32,1) forwards; }
            .lang-globe-icon    { animation: langGlobeSpin 1.8s ease-in-out infinite; display: inline-block; }
            .lang-bounce-dot    { animation: langDotBounce 1.2s ease-in-out infinite; display: inline-block; }
            .lang-bounce-dot:nth-child(2) { animation-delay: 0.2s; }
            .lang-bounce-dot:nth-child(3) { animation-delay: 0.4s; }
        </style>

        {{-- Radial glow --}}
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 50% 40% at 50% 50%, rgba(99,102,241,0.15) 0%, transparent 70%);"></div>

        <div class="lang-loader-card relative z-10 flex flex-col items-center gap-5 px-10 py-10 rounded-3xl bg-white/5 border border-white/10 shadow-2xl max-w-xs w-full mx-4">
            {{-- Globe --}}
            <div class="lang-globe-icon text-6xl select-none">🌐</div>

            {{-- Translating label --}}
            <div class="text-center">
                <p class="font-vt323 text-white/50 text-[11px] tracking-[0.4em] uppercase mb-1">System.Locale</p>
                <p class="font-vt323 text-white text-2xl tracking-widest uppercase">
                    TRANSLATING<span class="lang-bounce-dot ml-0.5">.</span><span class="lang-bounce-dot">.</span><span class="lang-bounce-dot">.</span>
                </p>
            </div>

            {{-- Target language (injected by JS) --}}
            <div id="lang-loader-target" class="flex items-center gap-3 px-4 py-2 bg-indigo-500/10 border border-indigo-400/20 rounded-xl">
                <span class="text-2xl">🏳️</span>
                <span class="text-white/70 font-mono text-sm tracking-widest" id="lang-loader-label">—</span>
            </div>

            {{-- Progress bar --}}
            <div class="w-full h-0.5 bg-white/10 rounded-full overflow-hidden mt-1">
                <div id="lang-progress-bar" class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-full" style="width:0%; transition: width 0.7s ease-out;"></div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════
         LOADING SCREEN #2: Dashboard (Matrix Terminal Style)
    ═══════════════════════════════════════════════════ --}}
    <div id="dash-loader" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center font-mono" style="display:none; background:#030c08;">
        <style>
            @keyframes scanLine    { from { top:-2px; } to { top:100%; } }
            @keyframes dashFadeIn  { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }
            @keyframes dashCursorBlink { 50% { opacity:0; } }
            @keyframes dashBarGrow { from { width:0%; } to { width:100%; } }
            .dash-terminal-line { animation: dashFadeIn 0.3s ease-out forwards; opacity:0; }
            .dash-cursor        { animation: dashCursorBlink 0.8s step-end infinite; }
            .dash-scanline      { position:absolute; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,#00ff41,transparent); animation:scanLine 2.5s linear infinite; pointer-events:none; z-index:2; }
        </style>

        {{-- Scanline --}}
        <div class="dash-scanline"></div>

        {{-- Grid noise overlay --}}
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none" style="background-image: repeating-linear-gradient(0deg,#00ff41 0,#00ff41 1px,transparent 0,transparent 28px), repeating-linear-gradient(90deg,#00ff41 0,#00ff41 1px,transparent 0,transparent 28px);"></div>

        {{-- Radial glow --}}
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 50% 60% at 50% 50%, rgba(0,255,65,0.07) 0%, transparent 70%);"></div>

        <div class="relative z-10 w-full max-w-sm mx-4 px-6 py-8 rounded-xl border border-[#00ff41]/20 bg-[#00ff41]/5 shadow-[0_0_60px_rgba(0,255,65,0.1)]">
            {{-- Header --}}
            <div class="flex items-center gap-2 mb-5 pb-3 border-b border-[#00ff41]/20">
                <div class="w-2.5 h-2.5 rounded-full bg-[#00ff41] shadow-[0_0_8px_#00ff41]"></div>
                <span class="text-[#00ff41]/60 font-mono text-[10px] tracking-[0.4em] uppercase">FNR-OS // SECURE TERMINAL</span>
            </div>

            {{-- Terminal output (lines injected by JS) --}}
            <div id="dash-terminal-output" class="space-y-1.5 mb-5 text-[11px] min-h-[72px]"></div>

            {{-- Active command line --}}
            <div class="flex items-center gap-2">
                <span class="text-[#00ff41]/60 text-xs">admin@fnr-os:~$</span>
                <span class="text-[#00ff41] text-xs" id="dash-typing"></span>
                <span class="dash-cursor text-[#00ff41] text-xs">█</span>
            </div>

            {{-- Progress --}}
            <div class="mt-4 h-px bg-[#00ff41]/10 rounded-full overflow-hidden">
                <div id="dash-progress" class="h-full bg-[#00ff41]/60 rounded-full" style="width:0%; transition: width 1.1s ease-out;"></div>
            </div>
        </div>
    </div>
</body>
</html>
