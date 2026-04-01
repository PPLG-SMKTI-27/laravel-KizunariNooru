<button {{ $attributes->merge(['type' => 'submit', 'class' => 'relative group overflow-hidden px-6 py-2.5 rounded-xl bg-cyan-500 text-white font-bold text-sm tracking-wide transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,211,238,0.4)] disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{-- Inner Glow Effect --}}
    <div class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
    
    {{-- Hover Shine --}}
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:animate-[shine_1s_ease-in-out_infinite] pointer-events-none"></div>

    <span class="relative z-10 flex items-center justify-center gap-2">
        {{ $slot }}
    </span>
</button>

<style>
@keyframes shine {
    100% { transform: translateX(100%); }
}
</style>
