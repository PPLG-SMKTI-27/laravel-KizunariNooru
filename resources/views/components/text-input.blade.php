@props(['disabled' => false])

<div class="relative group">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-blue-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-400 focus:bg-white/10 transition-all duration-300 shadow-inner']) !!}>
    
    {{-- Bottom Glow Effect --}}
    <div class="absolute inset-x-0 bottom-0 h-[1px] bg-gradient-to-r from-transparent via-cyan-400/50 to-transparent scale-x-0 group-focus-within:scale-x-100 transition-transform duration-500"></div>
</div>
