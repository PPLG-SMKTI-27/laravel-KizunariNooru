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

{{-- Inline script to instantly hide CRT loader before CSS paints it if already booted in session --}}
<script>
    if (sessionStorage.getItem('fnr_booted') === 'true') {
        var elPreloader = document.getElementById('fnr-preloader');
        if (elPreloader) elPreloader.style.display = 'none';
        var elTv = document.getElementById('tv-power-on');
        if (elTv) elTv.style.display = 'none';
    }
</script>
