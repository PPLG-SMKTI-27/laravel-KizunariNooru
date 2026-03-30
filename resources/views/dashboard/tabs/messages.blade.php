{{-- SECTION: MESSAGES --}}
<div x-show="tab === 'messages'" x-cloak class="space-y-6">
    <div class="card overflow-hidden">
        <div class="p-6 border-b border-cyan-400/10 flex items-center justify-between">
            <h3 class="font-display text-base font-bold text-white">Archives of Inquiry</h3>
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
                                <div class="relative group/avatar">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400/10 to-blue-600/10 border border-cyan-400/20 flex items-center justify-center text-xs font-black text-cyan-300 group-hover/avatar:border-cyan-400/40 transition duration-300 shadow-sm">
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
                                <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left whitespace-normal">
                                    <div class="mb-6">
                                        <h2 class="font-display text-xl font-bold text-white mb-1">{{ $c->subject ?? 'Untitled Inquiry' }}</h2>
                                        <div class="flex flex-col gap-1 mt-2">
                                            <p class="text-[10px] text-cyan-400/50 uppercase tracking-widest">From: {{ $c->name }} ({{ $c->email }})</p>
                                            <p class="text-[10px] text-emerald-400/80 uppercase tracking-widest font-bold">Budget: {{ $c->budget ?? 'Not specified' }}</p>
                                        </div>
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
