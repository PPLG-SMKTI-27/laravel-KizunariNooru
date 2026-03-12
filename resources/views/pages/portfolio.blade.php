<x-app-layout>
    <x-slot name="title">Projects — Fahri Noor Royyan</x-slot>

    <div class="pt-32 pb-20 relative overflow-hidden">
        {{-- Background elements --}}
        <div class="absolute inset-0 pointer-events-none"
             style="background:radial-gradient(circle at 50% -20%,rgba(34,211,238,0.1),transparent 70%)"></div>

        <div class="max-w-6xl mx-auto px-6 relative">
            {{-- Header Section --}}
            <div class="gsap-reveal mb-16 text-center">
                <span class="section-label">— Portfolio of works</span>
                <h1 class="section-title text-slate-100">Deep <span class="text-cyan-grad">Archives</span></h1>
                <p class="text-blue-200/50 text-sm mt-4 max-w-xl mx-auto leading-relaxed">
                    Koleksi lengkap proyek dan eksperimen digital yang telah saya bangun. Dari aplikasi web berskala besar hingga eksplorasi kreatif UI/UX.
                </p>
                <span class="section-line mx-auto"></span>
            </div>

            {{-- Projects Grid/Table --}}
            <div class="card overflow-hidden gsap-reveal border-cyan-400/20 shadow-2xl shadow-cyan-900/10">
                @if($projects->isEmpty())
                    <div class="text-center py-24">
                        <div class="w-16 h-16 rounded-full bg-cyan-400/5 flex items-center justify-center text-cyan-400 mx-auto mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <p class="text-blue-300/50 text-lg">No projects recorded yet</p>
                        <p class="text-blue-300/20 text-sm mt-1">The archives are currently empty.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-cyan-950/20">
                                <tr>
                                    <th class="px-8 py-5 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Archive ID</th>
                                    <th class="px-8 py-5 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Project Concept</th>
                                    <th class="px-8 py-5 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Technologies</th>
                                    <th class="px-8 py-5 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right">Reference</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-cyan-400/10">
                                @foreach($projects as $i => $project)
                                <tr class="hover:bg-cyan-400/5 transition group">
                                    <td class="px-8 py-6">
                                        <span class="font-cinzel text-xs text-blue-300/40">FNR-{{ str_pad($i + 1, 3, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td class="px-8 py-6 max-w-sm">
                                        <div class="flex flex-col">
                                            <span class="text-slate-100 font-bold text-base mb-1 group-hover:text-cyan-400 transition">{{ $project->title }}</span>
                                            <span class="text-blue-300/50 text-xs leading-relaxed line-clamp-2 italic">{{ $project->description }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-wrap gap-1.5 pt-1">
                                            @foreach(explode(',', $project->tech) as $t)
                                                <span class="px-2 py-0.5 rounded-md bg-cyan-400/5 border border-cyan-400/10 text-cyan-300 text-[9px] font-bold uppercase tracking-wider">{{ trim($t) }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end gap-3">
                                            @if($project->github)
                                            <a href="{{ $project->github }}" target="_blank" title="View Source" class="p-2 text-blue-300/40 hover:text-white transition rounded-lg hover:bg-white/5">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                            </a>
                                            @endif
                                            @if($project->demo)
                                            <a href="{{ $project->demo }}" target="_blank" title="Launch Demo" class="p-2 text-blue-300/40 hover:text-cyan-400 transition rounded-lg hover:bg-cyan-400/5">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            
            <div class="mt-12 text-center">
                <a href="/#contact" class="btn-primary" style="padding: 1rem 2.5rem;">
                    Let's Build Something Together ✨
                </a>
            </div>
        </div>
    </div>
</x-app-layout>>
</html>