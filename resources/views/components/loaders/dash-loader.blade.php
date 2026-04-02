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
