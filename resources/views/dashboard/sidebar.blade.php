{{-- SIDEBAR --}}
<aside id="sidebar" 
    :class="showMobileMenu ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed lg:sticky top-0 left-0 h-screen w-64 border-r border-cyan-400/10 bg-[#050f2e] lg:bg-[#050f2e]/60 backdrop-blur-3xl z-[100] lg:z-50 transition-all duration-300 flex flex-col">
    
    {{-- Mobile Close Button --}}
    <button @click="showMobileMenu = false" class="lg:hidden absolute top-6 right-6 text-cyan-400/50 hover:text-cyan-400">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/></button>
    </button>
    <div class="p-6">
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/20">
                <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>
            <div>
                <span class="font-cinzel text-lg font-bold text-white tracking-wide">FNR<span class="text-cyan-400">.</span>Admin</span>
                <p class="text-[8px] text-cyan-400/50 tracking-[0.3em] uppercase -mt-1 text-left">Court of Fontaine</p>
            </div>
        </div>

        <nav class="space-y-1.5 px-3">
            <button @click="tab = 'projects'; showMobileMenu = false" :class="tab === 'projects' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    <path d="M7 11v4M11 11v4M15 11v4" stroke-opacity="0.3"/>
                </svg>
                <span class="text-xs font-bold tracking-widest uppercase">Projects</span>
            </button>
            <button @click="tab = 'skills'; showMobileMenu = false" :class="tab === 'skills' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    <path d="M5 14l3-3m8 0l3 3" stroke-opacity="0.3"/>
                </svg>
                <span class="text-xs font-bold tracking-widest uppercase">Skills</span>
            </button>
            <button @click="tab = 'messages'; showMobileMenu = false" :class="tab === 'messages' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                <div class="relative">
                    <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        <path d="M12 8v4" stroke-opacity="0.3"/>
                    </svg>
                    @if($unreadCount > 0)
                        <span class="absolute -top-1 -right-1 w-2 h-2 bg-cyan-400 rounded-full border border-[#050f2e] animate-pulse"></span>
                    @endif
                </div>
                <span class="text-xs font-bold tracking-widest uppercase">Messages</span>
            </button>
        </nav>
    </div>

    <div class="mt-auto p-6 border-t border-cyan-400/10 bg-cyan-900/5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-cyan-400/10 border border-cyan-400/20 flex items-center justify-center text-cyan-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04M12 21a9.003 9.003 0 008.367-5.631L12 13V4.5"/>
                </svg>
            </div>
            <div class="flex-1 overflow-hidden">
                <p class="text-xs font-bold text-white truncate text-left">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-cyan-400/50 uppercase tracking-wider text-left">Supreme Admin</p>
            </div>
        </div>
    </div>
</aside>
