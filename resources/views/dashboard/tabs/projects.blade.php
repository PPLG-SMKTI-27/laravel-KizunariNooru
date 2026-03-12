{{-- SECTION: PROJECTS --}}
<div x-show="tab === 'projects'" x-cloak class="space-y-6">
    <div class="card overflow-hidden">
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
                @php
                    $icons = [
                        ['path' => '<path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>', 'color' => 'cyan'],
                        ['path' => '<path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>', 'color' => 'blue'],
                        ['path' => '<path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>', 'color' => 'amber'],
                        ['path' => '<path d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z"/><path d="M9.879 16.121A3 3 0 1012.015 11L11 14l.879 2.121z"/>', 'color' => 'rose'],
                        ['path' => '<path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>', 'color' => 'emerald'],
                        ['path' => '<path d="M13 10V3L4 14h7v7l9-11h-7z"/>', 'color' => 'cyan']
                    ];

                    $techMap = [
                        'laravel' => 'laravel', 'php' => 'php', 'javascript' => 'javascript', 'js' => 'javascript',
                        'vue' => 'vuedotjs', 'react' => 'react', 'tailwind' => 'tailwindcss', 'css' => 'css3',
                        'mysql' => 'mysql', 'node' => 'nodedotjs', 'gsap' => 'gsap', 'alpine' => 'alpinedotjs',
                        'html' => 'html5', 'bootstrap' => 'bootstrap', 'git' => 'git', 'github' => 'github',
                        'python' => 'python', 'docker' => 'docker', 'redis' => 'redis', 'livewire' => 'livewire',
                        'sqlite' => 'sqlite', 'postgresql' => 'postgresql', 'inertia' => 'inertia', 'vite' => 'vite',
                        'blade' => 'laravel', 'sass' => 'sass', 'typescript' => 'typescript', 'ts' => 'typescript',
                        'figma' => 'figma', 'canva' => 'canva', 'framer' => 'framer', 'next' => 'nextdotjs'
                    ];
                @endphp
                @forelse($projects as $index => $p)
                    @php 
                        $iData = $icons[$index % count($icons)]; 
                        $colors = [
                            'cyan' => ['bg' => 'bg-cyan-400/10', 'border' => 'border-cyan-400/20', 'text' => 'text-cyan-400', 'shadow' => 'shadow-cyan-400/20'],
                            'blue' => ['bg' => 'bg-blue-400/10', 'border' => 'border-blue-400/20', 'text' => 'text-blue-400', 'shadow' => 'shadow-blue-400/20'],
                            'amber' => ['bg' => 'bg-amber-400/10', 'border' => 'border-amber-400/20', 'text' => 'text-amber-400', 'shadow' => 'shadow-amber-400/20'],
                            'rose' => ['bg' => 'bg-rose-400/10', 'border' => 'border-rose-400/20', 'text' => 'text-rose-400', 'shadow' => 'shadow-rose-400/20'],
                            'emerald' => ['bg' => 'bg-emerald-400/10', 'border' => 'border-emerald-400/20', 'text' => 'text-emerald-400', 'shadow' => 'shadow-emerald-400/20'],
                        ];
                        $c = $colors[$iData['color']];
                    @endphp
                    <tr class="hover:bg-cyan-400/5 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl {{ $c['bg'] }} border {{ $c['border'] }} flex items-center justify-center {{ $c['text'] }} group-hover:scale-110 group-hover:{{ $c['shadow'] }} group-hover:shadow-lg transition duration-500 relative overflow-hidden">
                                    <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                                    <svg class="w-6 h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! $iData['path'] !!}
                                    </svg>
                                </div>
                                <div class="transition-transform duration-300 group-hover:translate-x-1">
                                    <span class="text-sm font-black text-white block tracking-tight">{{ $p->title }}</span>
                                    <span class="text-[10px] text-blue-300/40 font-medium truncate max-w-[220px] block mt-0.5">{{ Str::limit($p->description, 50) }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $p->tech) as $tech)
                                    @php 
                                        $tClean = strtolower(trim($tech));
                                        $slug = $techMap[$tClean] ?? null;
                                        $iconText = trim($tech);
                                    @endphp
                                    <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-lg bg-[#0a1a48]/40 border border-cyan-400/10 hover:border-cyan-400/30 hover:bg-[#0a1a48]/60 transition duration-300 group/tag">
                                        @if($slug)
                                            <img src="https://cdn.simpleicons.org/{{ $slug }}/f8fafc" class="w-3.5 h-3.5 group-hover/tag:brightness-150 transition" alt="">
                                        @endif
                                        <span class="text-[9px] font-bold text-cyan-100/90 group-hover/tag:text-white transition uppercase tracking-tighter">{{ $iconText }}</span>
                                    </div>
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
                                <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left whitespace-normal">
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
                    <tr><td colspan="3" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">Archives are empty.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
