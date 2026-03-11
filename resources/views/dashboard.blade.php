<x-app-layout>
    <div class="flex min-h-screen bg-transparent" x-data="{ tab: 'projects' }">
        
        {{-- SIDEBAR --}}
        <aside id="sidebar" class="hidden lg:flex flex-col w-64 border-r border-cyan-400/10 bg-[#050f2e]/60 backdrop-blur-3xl sticky top-0 h-screen z-50 transition-all duration-500">
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
                    <button @click="tab = 'projects'" :class="tab === 'projects' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                        <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span class="text-xs font-bold tracking-widest uppercase">Projects</span>
                    </button>
                    <button @click="tab = 'skills'" :class="tab === 'skills' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                        <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span class="text-xs font-bold tracking-widest uppercase">Skills</span>
                    </button>
                    <button @click="tab = 'messages'" :class="tab === 'messages' ? 'bg-cyan-500/10 text-cyan-300 border border-cyan-400/20' : 'text-blue-200/40 hover:bg-white/5 hover:text-cyan-200'" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group">
                        <div class="relative">
                            <svg class="w-5 h-5 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
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
                    <div class="w-10 h-10 rounded-lg bg-cyan-400/10 border border-cyan-400/20 flex items-center justify-center text-cyan-300 text-xs">👑</div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-xs font-bold text-white truncate text-left">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-cyan-400/50 uppercase tracking-wider text-left">Supreme Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- MAIN --}}
        <main class="flex-1 relative">
            <header class="sticky top-0 z-40 flex items-center justify-between px-8 py-4 bg-[#020814]/60 backdrop-blur-xl border-b border-cyan-400/10">
                <div class="flex items-center gap-6">
                    <button class="lg:hidden p-2 text-cyan-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
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

            <div class="p-8 h-[calc(100vh-73px)] overflow-y-auto">
                {{-- Messages --}}
                @if(session('success'))
                <div class="mb-6 px-6 py-4 rounded-2xl border border-emerald-400/30 bg-emerald-400/10 text-emerald-400 text-sm flex items-center gap-3 gsap-reveal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                {{-- Dashboard Hero --}}
                <div class="mb-10 p-10 rounded-[2rem] relative overflow-hidden bg-gradient-to-br from-[#0a1a48] to-[#050f2e] border border-cyan-400/20 shadow-2xl gsap-reveal group">
                    {{-- Decorative background blobs --}}
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl group-hover:scale-110 transition duration-1000"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl group-hover:scale-110 transition duration-1000"></div>

                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                        <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 p-1 shadow-lg shadow-cyan-500/20">
                            <div class="w-full h-full rounded-[0.9rem] bg-[#020814] flex items-center justify-center text-3xl">🏛️</div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="font-cinzel text-3xl font-bold text-white mb-2 tracking-tight">Welcome, <span class="text-cyan-grad">Architect</span></h2>
                            <p class="text-blue-200/50 text-sm mb-6 leading-relaxed max-w-md">The archives of Fontaine are under your command. Every link and pixel orchestrated with calculated grace.</p>
                            <div class="flex flex-wrap justify-center md:justify-start gap-3">
                                <a href="/" target="_blank" class="btn-primary hover:btn-glow transition-all" style="padding: 0.6rem 1.5rem; font-size: 0.75rem;">
                                    View Live Portfolio
                                </a>
                                <button @click="tab = 'projects'; $dispatch('open-modal', 'create-project')" class="btn-outline group/btn" style="padding: 0.6rem 1.5rem; font-size: 0.75rem;">
                                    <span class="group-hover/btn:rotate-90 transition duration-300 inline-block mr-1 text-cyan-400">+</span> Forge Project
                                </button>
                            </div>
                        </div>
                        <div class="hidden lg:block w-px h-20 bg-cyan-400/10"></div>
                        <div class="hidden lg:flex flex-col items-center px-8">
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
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">01</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Total Works</h3>
                        <p class="text-2xl font-cinzel font-bold text-white mt-1">{{ $projectCount }}</p>
                    </div>
                    {{-- Skills --}}
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">02</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Abilities</h3>
                        <p class="text-2xl font-cinzel font-bold text-white mt-1">{{ $skills->count() }}</p>
                    </div>
                    {{-- Messages --}}
                    <div class="card p-6 border-cyan-400/10 hover:border-cyan-400/30 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-cyan-400/20 group-hover:text-cyan-400/40 transition">03</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Inquiries</h3>
                        <p class="text-2xl font-cinzel font-bold text-white mt-1">{{ $contacts->count() }}</p>
                    </div>
                    {{-- System --}}
                    <div class="card p-6 border-emerald-400/10 hover:border-emerald-400/30 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-400/5 border border-emerald-400/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-400 group-hover:text-[#020814] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4" stroke-width="2"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-400/20 group-hover:text-emerald-400/40 transition">04</span>
                        </div>
                        <h3 class="text-blue-300/40 text-[10px] font-bold uppercase tracking-widest">Core Status</h3>
                        <p class="text-2xl font-cinzel font-bold text-white mt-1">Healthy</p>
                    </div>
                </div>

                {{-- SECTION: PROJECTS --}}
                <template x-if="tab === 'projects'">
                    <div class="space-y-6">
                        <div class="card overflow-hidden gsap-reveal">
                            <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
                                <h3 class="font-cinzel text-base font-bold text-white">Project Orchestration</h3>
                                <button @click="$dispatch('open-modal', 'create-project')" class="text-xs text-cyan-400 hover:text-white transition font-bold tracking-widest uppercase">+ Add Project</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead class="bg-white/2">
                                        <tr>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Project</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest hidden md:table-cell">Technologies</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right pr-12">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-cyan-400/5">
                                    @forelse($projects as $p)
                                        <tr class="hover:bg-cyan-400/5 transition group">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 rounded-xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-lg group-hover:scale-110 transition duration-300">📁</div>
                                                    <div>
                                                        <span class="text-sm font-bold text-white block">{{ $p->title }}</span>
                                                        <span class="text-[10px] text-blue-300/40 truncate max-w-[200px] block mt-0.5">{{ Str::limit($p->description, 40) }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 hidden md:table-cell">
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach(explode(',', $p->tech) as $tech)
                                                        <span class="px-1.5 py-0.5 rounded-md bg-cyan-400/5 border border-cyan-400/10 text-[9px] text-cyan-300">{{ trim($tech) }}</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-right pr-6">
                                                <div class="flex justify-end gap-1">
                                                    <button @click="$dispatch('open-modal', 'edit-project-{{ $p->id }}')" title="Edit" class="p-2 text-cyan-400/40 hover:text-cyan-400 hover:bg-cyan-400/10 rounded-lg transition">
                                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="1.5"/></svg>
                                                    </button>
                                                    <form method="POST" action="{{ route('projects.destroy', $p) }}" onsubmit="return confirm('Erase this project?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Delete" class="p-2 text-red-500/40 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="1.5"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                {{-- Edit Project Modal --}}
                                                <x-modal name="edit-project-{{ $p->id }}" focusable>
                                                    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
                                                        <h2 class="font-cinzel text-xl font-bold text-white mb-6">Refine Project</h2>
                                                        <form method="POST" action="{{ route('projects.update', $p) }}" class="space-y-4">
                                                            @csrf @method('PATCH')
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                                                                <input type="text" name="title" value="{{ $p->title }}" required class="input-furina">
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description</label>
                                                                <textarea name="description" rows="3" required class="input-furina">{{ $p->description }}</textarea>
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Tech Stack</label>
                                                                <input type="text" name="tech" value="{{ $p->tech }}" placeholder="PHP, Laravel, CSS" class="input-furina">
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-4">
                                                                <div>
                                                                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">GitHub Link</label>
                                                                    <input type="url" name="github" value="{{ $p->github }}" placeholder="https://github.com/..." class="input-furina">
                                                                </div>
                                                                <div>
                                                                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Demo Link</label>
                                                                    <input type="url" name="demo" value="{{ $p->demo }}" placeholder="https://demo.com/..." class="input-furina">
                                                                </div>
                                                            </div>
                                                            <div class="flex justify-end gap-3 mt-8">
                                                                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                                                                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </x-modal>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="2" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">Archives are empty.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- SECTION: SKILLS --}}
                <template x-if="tab === 'skills'">
                    <div class="space-y-6">
                        <div class="card overflow-hidden gsap-reveal">
                            <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
                                <h3 class="font-cinzel text-base font-bold text-white">Skills Repertoire</h3>
                                <button @click="$dispatch('open-modal', 'create-skill')" class="text-xs text-cyan-400 hover:text-white transition font-bold tracking-widest uppercase">+ Add Skill</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead class="bg-white/2">
                                        <tr>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Skill & Category</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Mastery Level</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right pr-12">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-cyan-400/5">
                                    @forelse($skills as $s)
                                        <tr class="hover:bg-cyan-400/5 transition group">
                                            <td class="px-6 py-4">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-bold text-white">{{ $s->name }}</span>
                                                    <span class="inline-flex mt-1 text-[9px] font-black uppercase tracking-tighter text-cyan-400/50">{{ $s->category ?? 'General' }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-4">
                                                    <div class="flex-1 max-w-[120px] h-1.5 bg-white/5 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-cyan-600 to-cyan-400 rounded-full group-hover:brightness-125 transition-all duration-500" style="width: {{ $s->percentage }}%"></div>
                                                    </div>
                                                    <span class="text-[10px] font-mono font-bold text-cyan-300 opacity-60">{{ $s->percentage }}%</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-right pr-6">
                                                <div class="flex justify-end gap-1">
                                                    <button @click="$dispatch('open-modal', 'edit-skill-{{ $s->id }}')" title="Edit" class="p-2 text-cyan-400/40 hover:text-cyan-400 hover:bg-cyan-400/10 rounded-lg transition">
                                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="1.5"/></svg>
                                                    </button>
                                                    <form method="POST" action="{{ route('skills.destroy', $s) }}" onsubmit="return confirm('Forget this skill?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Delete" class="p-2 text-red-500/40 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="1.5"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                {{-- Edit Skill Modal --}}
                                                <x-modal name="edit-skill-{{ $s->id }}" focusable>
                                                    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
                                                        <h2 class="font-cinzel text-xl font-bold text-white mb-6">Refine Talent</h2>
                                                        <form method="POST" action="{{ route('skills.update', $s) }}" class="space-y-4">
                                                            @csrf @method('PATCH')
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Skill Name</label>
                                                                <input type="text" name="name" value="{{ $s->name }}" required class="input-furina">
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Percentage (0-100)</label>
                                                                <input type="number" name="percentage" value="{{ $s->percentage }}" min="0" max="100" required class="input-furina">
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category</label>
                                                                <select name="category" class="input-furina bg-[#050f2e]">
                                                                    <option value="Backend" {{ $s->category == 'Backend' ? 'selected' : '' }}>Backend</option>
                                                                    <option value="Frontend" {{ $s->category == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                                                                    <option value="Design" {{ $s->category == 'Design' ? 'selected' : '' }}>Design</option>
                                                                    <option value="Tools" {{ $s->category == 'Tools' ? 'selected' : '' }}>Tools</option>
                                                                </select>
                                                            </div>
                                                            <div class="flex justify-end gap-3 mt-8">
                                                                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                                                                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </x-modal>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="3" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">No talents listed yet.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- SECTION: MESSAGES --}}
                <template x-if="tab === 'messages'">
                    <div class="space-y-6">
                        <div class="card overflow-hidden gsap-reveal">
                            <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
                                <h3 class="font-cinzel text-base font-bold text-white">Archives of Inquiry</h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead class="bg-white/2">
                                        <tr>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Sender</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest hidden md:table-cell">Inquiry</th>
                                            <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right pr-12">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-cyan-400/5">
                                    @forelse($contacts as $c)
                                        <tr class="hover:bg-cyan-400/5 transition group {{ !$c->is_read ? 'bg-cyan-400/[0.02]' : 'opacity-80' }}">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="relative">
                                                        <div class="w-10 h-10 rounded-full bg-cyan-400/5 border border-cyan-400/20 flex items-center justify-center text-xs font-bold text-cyan-300">
                                                            {{ strtoupper(substr($c->name, 0, 1)) }}
                                                        </div>
                                                        @if(!$c->is_read)
                                                            <div class="absolute -top-0.5 -right-0.5 w-3 h-3 bg-cyan-400 rounded-full border-2 border-[#020814] animate-pulse"></div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span class="text-sm font-bold text-white block">{{ $c->name }}</span>
                                                        <span class="text-[9px] text-cyan-400/40 uppercase tracking-wider block mt-0.5">{{ $c->email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 hidden md:table-cell">
                                                <div class="flex flex-col">
                                                    <span class="text-xs font-bold text-blue-100/80 group-hover:text-cyan-300 transition">{{ $c->subject ?? 'No Subject' }}</span>
                                                    <span class="text-[10px] text-blue-200/20 truncate max-w-[200px] mt-0.5">{{ $c->message }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-right pr-6">
                                                <div class="flex justify-end gap-1">
                                                    <button @click="$dispatch('open-modal', 'view-message-{{ $c->id }}')" title="View Message" class="p-2 text-cyan-400/40 hover:text-cyan-400 hover:bg-cyan-400/10 rounded-lg transition">
                                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="1.5"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="1.5"/></svg>
                                                    </button>
                                                    <form method="POST" action="{{ route('contacts.destroy', $c) }}" onsubmit="return confirm('Archive message permanently?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" title="Archive" class="p-2 text-red-500/40 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="1.5"/></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                {{-- View Message Modal --}}
                                                <x-modal name="view-message-{{ $c->id }}" focusable>
                                                    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
                                                        <div class="mb-6">
                                                            <h2 class="font-cinzel text-xl font-bold text-white mb-1">{{ $c->subject ?? 'Untitled Inquiry' }}</h2>
                                                            <p class="text-[10px] text-cyan-400/50 uppercase tracking-widest">From: {{ $c->name }} ({{ $c->email }})</p>
                                                        </div>
                                                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 text-blue-100/70 text-sm leading-relaxed whitespace-pre-wrap mb-8">
                                                            {{ $c->message }}
                                                        </div>
                                                        <div class="flex justify-end gap-3">
                                                            @if(!$c->is_read)
                                                            <form method="POST" action="{{ route('contacts.update', $c) }}">
                                                                @csrf @method('PATCH')
                                                                <button type="submit" class="btn-outline" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Mark as Read</button>
                                                            </form>
                                                            @endif
                                                            <button type="button" @click="$dispatch('close')" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Close</button>
                                                        </div>
                                                    </div>
                                                </x-modal>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="3" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">The postbox is empty.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </main>

        {{-- GLOBAL CREATE MODALS --}}
        {{-- Create Project --}}
        <x-modal name="create-project" focusable>
            <div class="p-8 bg-[#050f2e] border border-cyan-400/20">
                <h2 class="font-cinzel text-xl font-bold text-white mb-6">Forge New Project</h2>
                <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                        <input type="text" name="title" required class="input-furina">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description</label>
                        <textarea name="description" rows="3" required class="input-furina"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Tech Stack</label>
                        <input type="text" name="tech" placeholder="PHP, Laravel, CSS" class="input-furina">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">GitHub Link</label>
                            <input type="url" name="github" placeholder="https://github.com/..." class="input-furina">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Demo Link</label>
                            <input type="url" name="demo" placeholder="https://demo.com/..." class="input-furina">
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-8">
                        <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                        <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Forge</button>
                    </div>
                </form>
            </div>
        </x-modal>

        {{-- Create Skill --}}
        <x-modal name="create-skill" focusable>
            <div class="p-8 bg-[#050f2e] border border-cyan-400/20">
                <h2 class="font-cinzel text-xl font-bold text-white mb-6">Master New Skill</h2>
                <form method="POST" action="{{ route('skills.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Skill Name</label>
                        <input type="text" name="name" required class="input-furina">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Talent Level (0-100)</label>
                        <input type="number" name="percentage" required min="0" max="100" class="input-furina">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category</label>
                        <select name="category" class="input-furina bg-[#050f2e]">
                            <option value="Backend">Backend</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Design">Design</option>
                            <option value="Tools">Tools</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3 mt-8">
                        <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                        <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Learn</button>
                    </div>
                </form>
            </div>
        </x-modal>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.from('#sidebar', { x: -50, opacity: 0, duration: 0.8, ease: 'power3.out' });
            gsap.from('header', { y: -30, opacity: 0, duration: 0.6, ease: 'power3.out', delay: 0.2 });
        });
    </script>
</x-app-layout>
