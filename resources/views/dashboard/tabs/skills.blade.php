{{-- SECTION: SKILLS --}}
@php
    $skillIcons = [
        'laravel' => 'laravel', 'php' => 'php', 'javascript' => 'javascript', 'js' => 'javascript',
        'vue' => 'vuedotjs', 'react' => 'react', 'tailwind' => 'tailwindcss', 'css' => 'css3',
        'mysql' => 'mysql', 'node' => 'nodedotjs', 'gsap' => 'gsap', 'alpine' => 'alpinedotjs',
        'html' => 'html5', 'bootstrap' => 'bootstrap', 'git' => 'git', 'github' => 'github',
        'python' => 'python', 'docker' => 'docker', 'redis' => 'redis', 'livewire' => 'livewire',
        'ui' => 'figma', 'ux' => 'figma', 'design' => 'adobecreativecloud', 'photoshop' => 'adobephotoshop',
        'illustrator' => 'adobeillustrator', 'figma' => 'figma'
    ];
@endphp
<div x-show="tab === 'skills'" x-cloak class="space-y-6">
    <div class="card overflow-hidden">
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
                            <div class="flex items-center gap-3">
                                @php 
                                    $sNameLower = strtolower($s->name);
                                    $sSlug = null;
                                    foreach($skillIcons as $key => $val) {
                                        if(str_contains($sNameLower, $key)) {
                                            $sSlug = $val;
                                            break;
                                        }
                                    }
                                @endphp
                                <div class="w-10 h-10 rounded-xl bg-[#0a1a48]/40 border border-cyan-400/10 flex items-center justify-center group-hover:border-cyan-400/30 transition duration-500">
                                    @if($sSlug)
                                        <img src="https://cdn.simpleicons.org/{{ $sSlug }}/06b6d4" class="w-5 h-5 opacity-60 group-hover:opacity-100 transition duration-500" alt="">
                                    @else
                                        <svg class="w-5 h-5 text-cyan-400/40 group-hover:text-cyan-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-white tracking-tight">{{ $s->name }}</span>
                                    <span class="inline-flex mt-0.5 text-[9px] font-black uppercase tracking-tighter text-cyan-400/40">{{ $s->category ?? 'General' }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="flex-1 max-w-[140px] h-2 bg-slate-900/60 rounded-full overflow-hidden border border-white/5 relative">
                                    <div class="absolute inset-0 bg-cyan-400/5 animate-pulse"></div>
                                    <div class="h-full bg-gradient-to-r from-blue-600 via-cyan-500 to-cyan-400 rounded-full group-hover:brightness-125 group-hover:shadow-[0_0_15px_rgba(34,211,238,0.6)] transition-all duration-700 relative z-10" style="width: {{ $s->percentage }}%"></div>
                                </div>
                                <span class="text-[10px] font-mono font-black text-cyan-400/80 group-hover:text-cyan-400 transition tracking-tighter">{{ $s->percentage }}%</span>
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
                                <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left whitespace-normal">
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
                                                <option value="General" {{ (!$s->category || $s->category == 'General') ? 'selected' : '' }}>General</option>
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
