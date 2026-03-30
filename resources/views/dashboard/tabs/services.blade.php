{{-- SECTION: SERVICES --}}
<div x-show="tab === 'services'" x-cloak class="space-y-6">
    <div class="card overflow-hidden">
        <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
            <h3 class="font-display text-base font-bold text-white">Professional Services</h3>
            <button @click="$dispatch('open-modal', 'create-service')" class="text-xs text-cyan-400 hover:text-white transition font-bold tracking-widest uppercase">+ Add Service</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/2">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Service</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest hidden md:table-cell">Description</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right pr-12">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-400/5">
                @forelse($services as $svc)
                    <tr class="hover:bg-cyan-400/5 transition group">
                        <td class="px-6 py-4">
                            <div>
                                <span class="text-sm font-bold text-white block">{{ $svc->title }}</span>
                                <span class="text-[9px] text-cyan-400/40 uppercase tracking-wider">{{ $svc->label }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <span class="text-[10px] text-blue-200/30 truncate max-w-[300px] block">{{ Str::limit($svc->description, 70) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right pr-6">
                            <div class="flex justify-end gap-1">
                                <button @click="$dispatch('open-modal', 'edit-service-{{ $svc->id }}')" class="p-2 text-cyan-400/40 hover:text-cyan-400 hover:bg-cyan-400/10 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="1.5"/></svg>
                                </button>
                                <form method="POST" action="{{ route('services.destroy', $svc) }}" onsubmit="return confirm('Remove service?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500/40 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="1.5"/></svg>
                                    </button>
                                </form>
                            </div>
                            <x-modal name="edit-service-{{ $svc->id }}" focusable>
                                <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
                                    <h2 class="font-display text-xl font-bold text-white mb-6">Edit Service</h2>
                                    <form method="POST" action="{{ route('services.update', $svc) }}" class="space-y-4">
                                        @csrf @method('PATCH')
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                                                <input type="text" name="title" value="{{ $svc->title }}" required class="input-furina">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Label / Subtitle</label>
                                                <input type="text" name="label" value="{{ $svc->label }}" required class="input-furina">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description</label>
                                            <textarea name="description" rows="3" required class="input-furina">{{ $svc->description }}</textarea>
                                        </div>
                                        <div class="flex justify-end gap-3 mt-4">
                                            <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                                            <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </x-modal>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">No services yet.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-modal name="create-service" focusable>
    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
        <h2 class="font-display text-xl font-bold text-white mb-6">Add Service</h2>
        <form method="POST" action="{{ route('services.store') }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                    <input type="text" name="title" required placeholder="Full-Stack Development" class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Label / Subtitle</label>
                    <input type="text" name="label" required placeholder="Scalable Systems" class="input-furina">
                </div>
            </div>
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description</label>
                <textarea name="description" rows="3" required placeholder="Describe what you offer..." class="input-furina"></textarea>
            </div>
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Add</button>
            </div>
        </form>
    </div>
</x-modal>
