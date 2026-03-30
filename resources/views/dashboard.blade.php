<x-app-layout>
    <div class="flex min-h-screen bg-transparent" x-data="{ tab: 'projects', showMobileMenu: false }">
        
        @include('dashboard.sidebar')

        {{-- MAIN --}}
        <main class="flex-1 relative min-w-0">
            @include('dashboard.header')

            <div class="p-4 md:p-8 h-[calc(100vh-73px)] overflow-y-auto">
                {{-- Alerts --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                        <ul class="list-disc list-inside text-red-400 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                
                {{-- Dashboard Hero --}}
                <div class="mb-10 p-6 md:p-10 rounded-[2rem] relative overflow-hidden bg-gradient-to-br from-[#0a1a48] to-[#050f2e] border border-cyan-400/20 shadow-lg group">
                    {{-- Decorative background blobs --}}
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl group-hover:scale-110 transition duration-1000"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl group-hover:scale-110 transition duration-1000"></div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 p-1 shadow-lg shadow-cyan-500/20 shrink-0">
                            <div class="w-full h-full rounded-[0.9rem] bg-[#020814] flex items-center justify-center text-cyan-400">
                                <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-2 tracking-tight">Welcome, <span class="text-cyan-grad">Architect</span></h2>
                            <p class="text-blue-200/50 text-xs md:text-sm mb-6 leading-relaxed max-w-md mx-auto md:mx-0">The archives of Fontaine are under your command. Setiap baris kode dirajut dengan ketelitian kristal.</p>
                            <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-3">
                                <a href="/" target="_blank" class="btn-primary hover:btn-glow transition-all" style="padding: 0.6rem 1.5rem; font-size: 0.75rem;">
                                    View Live Portfolio
                                </a>
                                <button @click="tab = 'projects'; $dispatch('open-modal', 'create-project')" class="btn-outline group/btn" style="padding: 0.6rem 1.5rem; font-size: 0.75rem;">
                                    <span class="group-hover/btn:rotate-90 transition duration-300 inline-block mr-1 text-cyan-400">+</span> Forge Project
                                </button>
                            </div>
                        </div>
                        <div class="hidden lg:block w-px h-20 bg-cyan-400/10"></div>
                        <div class="hidden lg:flex flex-col items-center px-8 shrink-0">
                            <span class="text-[10px] font-black text-cyan-400/30 uppercase tracking-[0.3em] mb-1">Status</span>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-xs font-bold text-white">Online</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 gsap-stagger">
                    {{-- Projects --}}
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-cyan-400/5 rounded-full blur-2xl group-hover:bg-cyan-400/10 transition"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <span class="font-display text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">LVL.01</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Total Works</h3>
                        <p class="text-2xl font-display font-bold text-white mt-1">{{ $projectCount }}</p>
                    </div>
                    {{-- Skills --}}
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-cyan-400/5 rounded-full blur-2xl group-hover:bg-cyan-400/10 transition"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="font-display text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">LVL.02</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Abilities</h3>
                        <p class="text-2xl font-display font-bold text-white mt-1">{{ $skills->count() }}</p>
                    </div>
                    {{-- Messages --}}
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-cyan-400/5 rounded-full blur-2xl group-hover:bg-cyan-400/10 transition"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="font-display text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">LVL.03</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Inquiries</h3>
                        <p class="text-2xl font-display font-bold text-white mt-1">{{ $contacts->count() }}</p>
                    </div>
                    {{-- System --}}
                    <div class="card p-6 border-emerald-400/10 hover:border-emerald-400/30 transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-emerald-400/5 rounded-full blur-2xl group-hover:bg-emerald-400/10 transition"></div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-400/5 border border-emerald-400/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                </svg>
                            </div>
                            <span class="font-display text-[10px] font-bold text-emerald-400/20 group-hover:text-emerald-400/40 transition">LVL.04</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Core Status</h3>
                        <p class="text-2xl font-display font-bold text-white mt-1">Healthy</p>
                    </div>
                </div>

                @include('dashboard.tabs.projects')
                @include('dashboard.tabs.skills')
                @include('dashboard.tabs.messages')
                @include('dashboard.tabs.certificates')
                @include('dashboard.tabs.services')
                @include('dashboard.tabs.settings')
            </div>
        </main>

        @include('dashboard.modals')

    </div>

    <script>
        // Animations removed for a flatter dashboard experience
    </script>
</x-app-layout>
