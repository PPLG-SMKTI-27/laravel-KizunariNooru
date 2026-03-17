{{-- HEADER --}}
<header class="sticky top-0 z-40 flex items-center justify-between px-4 md:px-8 py-4 bg-[#020814]/60 backdrop-blur-xl border-b border-cyan-400/10">
    <div class="flex items-center gap-6">
        <button @click="showMobileMenu = !showMobileMenu" class="lg:hidden p-2 text-cyan-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"/></svg>
        </button>
        <div class="hidden md:flex items-center gap-2 text-xs font-bold tracking-widest uppercase">
            <span class="text-cyan-400/40">Admin</span>
            <svg class="w-3 h-3 text-cyan-400/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            <span class="text-white" x-text="tab.charAt(0).toUpperCase() + tab.slice(1)"></span>
        </div>
    </div>

    <div class="flex items-center gap-6">
        {{-- Search bar placeholder --}}
        <div class="hidden sm:block relative">
            <input type="text" placeholder="Search archives..." class="w-64 bg-white/5 border border-cyan-400/10 rounded-full py-1.5 pl-9 pr-4 text-xs text-blue-100 placeholder:text-blue-100/20 focus:outline-none focus:border-cyan-400/30 transition-all">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-cyan-400/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>

        <div class="h-6 w-px bg-cyan-400/10"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex items-center gap-2 text-blue-200/50 hover:text-red-400 transition text-[10px] font-bold uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
            </button>
        </form>
    </div>
</header>
