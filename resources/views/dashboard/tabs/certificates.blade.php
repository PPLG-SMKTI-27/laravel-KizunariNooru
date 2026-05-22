{{-- SECTION: CERTIFICATES --}}
<div x-show="tab === 'certificates'" x-cloak class="space-y-6">
    <div class="card overflow-hidden">
        <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
            <h3 class="font-display text-base font-bold text-white">Certifications & Learning</h3>
            <button @click="$dispatch('open-modal', 'create-certificate')" class="text-xs text-cyan-400 hover:text-white transition font-bold tracking-widest uppercase">+ Add Certificate</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/2">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest">Certificate</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest hidden md:table-cell">Category / Progress</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest hidden lg:table-cell">Image</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest text-right pr-12">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-400/5">
                @forelse($certificates as $cert)
                    <tr class="hover:bg-cyan-400/5 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl {{ $cert->progress == 100 ? 'bg-emerald-400/10 border-emerald-400/20 text-emerald-400' : 'bg-cyan-400/10 border-cyan-400/20 text-cyan-400' }} border flex items-center justify-center text-xs font-bold">
                                    {{ $cert->progress ?? 0 }}%
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-white block">{{ $cert->title }}</span>
                                    <span class="text-[9px] text-cyan-400/40 uppercase tracking-wider">{{ $cert->issuer }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-cyan-300/70">{{ $cert->category }}</span>
                                <div class="w-32 h-1 bg-white/10 rounded-full overflow-hidden">
                                    <div class="{{ $cert->progress == 100 ? 'bg-emerald-400' : 'bg-gradient-to-r from-cyan-400 to-blue-500' }} h-full rounded-full" @style(['width' => ($cert->progress ?? 0) . '%'])></div>
                                </div>
                                <span class="text-[9px] text-blue-200/30">{{ $cert->date }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            @if($cert->image)
                                <a href="{{ Storage::url($cert->image) }}" target="_blank">
                                    <img src="{{ Storage::url($cert->image) }}" alt="Certificate" class="w-20 h-14 object-cover rounded-lg border border-cyan-400/20 hover:scale-105 transition-transform">
                                </a>
                            @else
                                <span class="text-[10px] text-blue-200/20 italic">No image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right pr-6">
                            <div class="flex justify-end gap-1">
                                <button @click="$dispatch('open-modal', 'edit-cert-{{ $cert->id }}')" class="p-2 text-cyan-400/40 hover:text-cyan-400 hover:bg-cyan-400/10 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="1.5"/></svg>
                                </button>
                                <form method="POST" action="{{ route('certificates.destroy', $cert) }}" onsubmit="return confirm('Remove certificate?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500/40 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="1.5"/></svg>
                                    </button>
                                </form>
                            </div>
                            {{-- Edit Modal --}}
                            <x-modal name="edit-cert-{{ $cert->id }}" focusable>
                                <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
                                    <h2 class="font-display text-xl font-bold text-white mb-6">Edit Certificate</h2>
                                    <form method="POST" action="{{ route('certificates.update', $cert) }}" class="space-y-4" enctype="multipart/form-data">
                                        @csrf @method('PATCH')
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                                                <input type="text" name="title" value="{{ $cert->title }}" required class="input-furina">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Issuer</label>
                                                <input type="text" name="issuer" value="{{ $cert->issuer }}" required class="input-furina">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category</label>
                                                <select name="category" class="input-furina bg-[#050f2e]">
                                                    @foreach(['Programming','Database','Tools','Seminar'] as $cat)
                                                    <option value="{{ $cat }}" {{ $cert->category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Date / Status</label>
                                                <input type="text" name="date" value="{{ $cert->date }}" placeholder="Completed / In Progress" class="input-furina">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Progress (0–100)</label>
                                                <input type="number" name="progress" value="{{ $cert->progress }}" min="0" max="100" class="input-furina">
                                            </div>
                                            <div>
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Credential URL</label>
                                                <input type="url" name="credential_url" value="{{ $cert->credential_url }}" placeholder="https://..." class="input-furina">
                                            </div>
                                            <div class="col-span-2">
                                                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Certificate Image</label>
                                                @if($cert->image)
                                                    <div class="mb-2">
                                                        <img src="{{ Storage::url($cert->image) }}" alt="Current" class="h-24 rounded-lg border border-cyan-400/20 object-cover">
                                                        <p class="text-[9px] text-cyan-400/40 mt-1">Current image — upload new to replace</p>
                                                    </div>
                                                @endif
                                                <input type="file" name="image" accept="image/*" class="input-furina text-sm file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-cyan-400/10 file:text-cyan-400 file:text-xs file:font-bold hover:file:bg-cyan-400/20">
                                            </div>
                                        </div>
                                        <div class="flex justify-end gap-3 mt-6">
                                            <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                                            <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </x-modal>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-12 text-center text-blue-300/30 text-sm italic">No certificates yet. Add your first one!</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Create Certificate Modal --}}
<x-modal name="create-certificate" focusable>
    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
        <h2 class="font-display text-xl font-bold text-white mb-6">Add Certificate</h2>
        <form method="POST" action="{{ route('certificates.store') }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                    <input type="text" name="title" required placeholder="Certificate Title" class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Issuer</label>
                    <input type="text" name="issuer" required placeholder="Coursera, Dicoding..." class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category</label>
                    <select name="category" class="input-furina bg-[#050f2e]">
                        <option value="Programming">Programming</option>
                        <option value="Database">Database</option>
                        <option value="Tools">Tools</option>
                        <option value="Seminar">Seminar</option>
                    </select>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Date / Status</label>
                    <input type="text" name="date" required placeholder="Completed / In Progress" class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Progress (0–100)</label>
                    <input type="number" name="progress" value="0" min="0" max="100" class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Credential URL</label>
                    <input type="url" name="credential_url" placeholder="https://..." class="input-furina">
                </div>
                <div class="col-span-2">
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Certificate Image</label>
                    <input type="file" name="image" accept="image/*" class="input-furina text-sm file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-cyan-400/10 file:text-cyan-400 file:text-xs file:font-bold hover:file:bg-cyan-400/20">
                    <p class="text-[9px] text-blue-200/30 mt-1">JPG, PNG, WEBP — max 5MB</p>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Add</button>
            </div>
        </form>
    </div>
</x-modal>
