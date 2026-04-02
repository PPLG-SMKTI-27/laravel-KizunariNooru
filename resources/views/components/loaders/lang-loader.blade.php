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
