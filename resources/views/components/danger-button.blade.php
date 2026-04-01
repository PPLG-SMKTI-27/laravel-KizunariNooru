<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600/20 border border-red-500/50 rounded-xl font-semibold text-xs text-red-500 uppercase tracking-widest hover:bg-red-600/30 active:bg-red-700/50 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:ring-offset-2 focus:ring-offset-[#050f2e] transition ease-in-out duration-150 shadow-[0_0_15px_rgba(239,68,68,0.2)]']) }}>
    {{ $slot }}
</button>
