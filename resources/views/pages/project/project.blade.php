<x-app-layout>
    <x-slot name="title">Project Archive // System Database</x-slot>

    <div class="pt-32 pb-20 relative overflow-hidden min-h-screen">
        {{-- Matrix Grid Background --}}
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="absolute inset-0 bg-linear-to-b from-blue-500/5 via-transparent to-cyan-500/5 opacity-40"></div>
            <div class="absolute inset-0 opacity-[0.03] mix-blend-overlay" style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png');"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(34,211,238,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.1) 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            {{-- Header Section --}}
            <div class="gsap-reveal mb-12 flex flex-col items-center text-center">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse shadow-[0_0_8px_rgba(34,211,238,0.8)]"></span>
                    <span class="text-[10px] font-mono text-cyan-400 tracking-[0.4em] uppercase border border-cyan-500/30 px-3 py-1 bg-cyan-950/30 rounded shadow-[inset_0_0_10px_rgba(34,211,238,0.05)]">SYSTEM_ARCHIVE</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 font-cinzel tracking-wider drop-shadow-[0_0_15px_rgba(34,211,238,0.1)]">
                    PROJECT <span class="text-transparent bg-clip-text bg-linear-to-r from-emerald-400 to-cyan-500">List</span>
                </h1>

                <p class="text-slate-400 text-sm max-w-2xl mx-auto leading-relaxed font-mono">
                    > Accessing complete records of digital systems, applications, and structural experimentations...
                </p>
                <div class="w-24 h-1 bg-linear-to-r from-transparent via-cyan-500/50 to-transparent mt-8"></div>
            </div>

            {{-- Search & UI --}}
            <div class="gsap-reveal mb-12">
                <form action="{{ route('portfolio') }}" method="GET" class="relative max-w-2xl mx-auto group">
                    <div class="absolute -inset-px bg-linear-to-r from-cyan-500/20 via-blue-500/20 to-emerald-500/20 rounded-xl blur-sm opacity-50 group-hover:opacity-100 transition duration-500"></div>

                    <div class="relative flex items-center bg-[#020510]/80 backdrop-blur-xl border border-cyan-500/30 p-2 rounded-xl shadow-[0_0_20px_rgba(34,211,238,0.05)]">
                        <div class="px-4 text-cyan-500/50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="QUERY SYSTEM DATABANKS..."
                            class="w-full bg-transparent border-none text-white placeholder-cyan-500/30 font-mono text-sm focus:ring-0 focus:outline-hidden p-3 tracking-widest">

                        <button type="submit" class="px-6 py-3 bg-cyan-950/50 hover:bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 rounded-lg text-xs font-bold uppercase tracking-widest transition-all">
                            SCAN
                        </button>
                    </div>
                </form>
            </div>

            {{-- Projects Cards Area --}}
            <div class="gsap-stagger">
                @if($projects->isEmpty())
                    <div class="text-center py-24 bg-[#020814]/50 border border-dashed border-cyan-500/20 rounded-2xl backdrop-blur-sm max-w-2xl mx-auto">
                        <div class="w-16 h-16 rounded-full border-2 border-dashed border-red-500/50 flex items-center justify-center text-red-500/80 mx-auto mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <p class="font-mono text-lg uppercase tracking-widest text-[#ef4444]">0 RECORDS_FOUND</p>
                        <p class="text-cyan-500/30 font-mono text-xs mt-2">No matching modules in the database.</p>

                        @if(request()->has('search'))
                            <a href="{{ route('portfolio') }}" class="inline-block mt-6 px-4 py-2 bg-cyan-900/30 border border-cyan-500/30 text-cyan-400 text-xs font-mono rounded hover:bg-cyan-800/50 transition">
                                [ RESET_QUERY ]
                            </a>
                        @endif
                    </div>
                @else
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-cyan-500/10">
                        <div class="text-xs font-mono text-cyan-500/50 uppercase tracking-widest">
                            Showing {{ count($projects) }} Modules
                        </div>
                        @if(request()->has('search') && request('search') != '')
                            <div class="text-[10px] md:text-xs font-mono text-emerald-400/80 uppercase tracking-widest bg-emerald-900/20 px-3 py-1.5 rounded border border-emerald-500/20 flex items-center">
                                Filter Active: "{{ request('search') }}"
                                <a href="{{ route('portfolio') }}" class="ml-3 text-red-400 hover:text-red-300 p-1 bg-red-500/10 rounded">✕</a>
                            </div>
                        @endif
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($projects as $index => $project)
                            <div class="group relative bg-[#020510]/80 backdrop-blur-md rounded-2xl border border-white/5 hover:border-cyan-500/30 transition-all duration-300 overflow-hidden flex flex-col hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(34,211,238,0.1)]">
                                {{-- Card Background Effect --}}
                                <div class="absolute inset-0 bg-linear-to-br from-cyan-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>                                <div class="p-5 flex flex-col grow relative z-10">
                                    {{-- Card Header: Icon & Actions --}}
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-10 h-10 rounded-xl bg-linear-to-br from-cyan-500/20 to-blue-600/10 border border-cyan-500/30 flex items-center justify-center shadow-[0_0_15px_rgba(34,211,238,0.1)] group-hover:shadow-[0_0_25px_rgba(34,211,238,0.2)] transition-all duration-500 relative overflow-hidden">
                                            <div class="absolute inset-0 bg-linear-to-tr from-cyan-400/10 via-transparent to-transparent opacity-50"></div>
                                            <svg class="w-5 h-5 text-cyan-400 transform group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                            </svg>
                                        </div>

                                        <div class="flex gap-2">
                                            @if($project->github)
                                                <a href="{{ $project->github }}" target="_blank" class="p-1.5 rounded-lg bg-slate-900/50 border border-white/5 text-slate-500 hover:text-white hover:border-cyan-500/30 transition-all duration-300">
                                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                                </a>
                                            @endif
                                            @if($project->demo)
                                                <a href="{{ $project->demo }}" target="_blank" class="p-1.5 rounded-lg bg-slate-900/50 border border-white/5 text-slate-500 hover:text-cyan-400 hover:border-cyan-500/30 transition-all duration-300">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="font-mono text-[9px] text-cyan-500/40 uppercase tracking-widest mb-2">
                                        FNR-ARCHIVE-{{ str_pad($project->id, 3, '0', STR_PAD_LEFT) }}
                                    </div>

                                    <h3 class="text-lg font-bold text-white mb-2 tracking-tight group-hover:text-cyan-400 transition-colors duration-300">
                                        {{ $project->title }}
                                    </h3>

                                    <p class="text-slate-400 text-[13px] leading-relaxed mb-4 line-clamp-3">
                                        {{ $project->description }}
                                    </p>

                                    @if($project->tech)
                                        <div class="flex flex-wrap gap-2 mt-auto">
                                            @foreach(explode(',', $project->tech) as $t)
                                                <span class="px-2.5 py-1 rounded-full bg-slate-900/80 border border-white/10 text-[8px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5 transition-all group-hover:border-cyan-500/30">
                                                    <span class="w-1 h-1 rounded-full bg-cyan-500/60 group-hover:bg-cyan-400 transition-colors"></span>
                                                    {{ trim($t) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Card Footer --}}
                                <div class="bg-[#010308]/50 border-t border-white/5 p-3 flex justify-between items-center relative z-10">
                                    <span class="text-[8px] font-mono text-slate-600 uppercase tracking-[0.2em]">
                                        // DATABASE_RECORD
                                    </span>
                                    <div class="flex items-center gap-1">
                                        <div class="w-1 h-1 rounded-full bg-emerald-500 shadow-[0_0_5px_rgba(16,185,129,0.5)]"></div>
                                        <span class="text-[8px] font-mono text-emerald-500/50 uppercase">Secured</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>>
</html>
