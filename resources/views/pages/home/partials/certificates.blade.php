{{-- ══════════════════════════════════════════════════════
     CERTIFICATES SECTION — DB-DRIVEN WITH IMAGE LIGHTBOX
══════════════════════════════════════════════════════ --}}
<section id="certificates" class="py-24 relative overflow-hidden bg-bg transition-colors duration-700"
    x-data="{ activeTab: 'Programming', lightbox: false, lightboxSrc: '', lightboxTitle: '' }">

    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden opacity-50">
        <div class="absolute top-0 right-1/4 w-64 h-64 bg-primary/5 blur-[100px] rounded-full animate-liquid"></div>
        <div class="absolute bottom-0 left-1/4 w-80 h-80 bg-primary-2/5 blur-[120px] rounded-full animate-liquid" style="animation-delay: -2s"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        <div class="gsap-reveal mb-16 text-center">
            <span class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-[10px] font-bold uppercase tracking-[0.3em] mb-4">
                {{ __('Continuous Growth') }}
            </span>
            <h2 class="font-display text-4xl md:text-5xl font-black text-text tracking-tight">
                {{ __('Certifications') }} <span class="text-muted/50 font-sans font-light">&</span> <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic px-1">{{ __('Learning') }}</span>
            </h2>
        </div>

        {{-- Dynamic Tabs --}}
        <div class="gsap-reveal flex flex-wrap justify-center gap-2 mb-12">
            @foreach(['Programming', 'Database', 'Tools', 'Seminar'] as $tab)
                <button @click="activeTab = '{{ $tab }}'"
                        :class="activeTab === '{{ $tab }}' ? 'bg-primary text-white shadow-primary/30 border-primary' : 'bg-surface/40 text-muted border-border hover:border-primary/50 hover:text-text'"
                        class="px-5 py-2 rounded-xl text-xs font-bold uppercase tracking-widest border transition-all duration-300 shadow-lg backdrop-blur-md">
                    {{ __($tab) }}
                </button>
            @endforeach
        </div>

        @if($certificates->isEmpty())
        <div class="text-center py-20 text-muted text-sm italic opacity-50">
            {{ __('No certificates added yet. Add them from the dashboard!') }}
        </div>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 gsap-stagger">
            @foreach($certificates as $cert)
                <div x-show="activeTab === '{{ $cert->category }}'"
                     x-transition:enter="transition ease-out duration-500 transform"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-surface/40 backdrop-blur-xl border border-border hover:border-primary/40 rounded-[2rem] overflow-hidden shadow-xl relative flex flex-col transition-all duration-300">

                    {{-- Certificate Image --}}
                    @if($cert->image)
                    <div class="relative w-full h-44 overflow-hidden cursor-zoom-in"
                         @click="lightbox = true; lightboxSrc = '{{ Storage::url($cert->image) }}'; lightboxTitle = '{{ addslashes($cert->title) }}'">
                        <img src="{{ Storage::url($cert->image) }}"
                             alt="{{ $cert->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent"></div>
                        {{-- Zoom hint --}}
                        <div class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/40 backdrop-blur-sm border border-white/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                    @else
                    {{-- No image placeholder --}}
                    <div class="w-full h-20 bg-gradient-to-br from-primary/5 to-primary-2/5 flex items-center justify-center border-b border-border/30">
                        <svg class="w-8 h-8 text-primary/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    </div>
                    @endif

                    {{-- Card Body --}}
                    <div class="p-6 flex flex-col flex-grow relative">
                        <div class="absolute -right-10 -top-10 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all duration-500"></div>

                        <div class="w-12 h-12 rounded-[1.2rem] {{ $cert->progress == 100 ? 'bg-success/10 text-success border border-success/20' : 'bg-bg border border-border text-primary' }} flex items-center justify-center mb-4 shadow-inner ring-[6px] ring-transparent group-hover:ring-primary/5 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cert->icon_svg ?? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' }}"/></svg>
                        </div>

                        <div class="flex-grow">
                            <h3 class="text-base font-bold text-text group-hover:text-primary transition-colors leading-tight mb-1">{{ __($cert->title) }}</h3>
                            <p class="text-xs font-bold text-muted uppercase tracking-widest mb-2">{{ __($cert->issuer) }}</p>

                            <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded bg-bg border border-border text-[9px] uppercase tracking-widest font-bold {{ $cert->progress == 100 ? 'text-success' : 'text-muted' }}">
                                @if($cert->progress == 100)
                                    <span class="w-1 h-1 rounded-full bg-success animate-pulse"></span>
                                @else
                                    <span class="w-1.5 h-1.5 border border-current rounded-sm"></span>
                                @endif
                                {{ __($cert->date) }}
                            </div>

                            @if($cert->credential_url)
                                <a href="{{ $cert->credential_url }}" target="_blank" class="block mt-2 text-[10px] text-primary hover:underline">{{ __('View Credential') }} →</a>
                            @endif
                        </div>

                        @if($cert->progress < 100)
                            <div class="w-full mt-4">
                                <div class="flex justify-between items-center text-[10px] font-bold uppercase text-muted mb-2">
                                    <span>{{ __('Currently Learning') }}</span>
                                    <span class="text-primary">{{ $cert->progress }}%</span>
                                </div>
                                <div class="w-full h-1 bg-border rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-primary to-primary-2 rounded-full" @style(['width' => ($cert->progress ?? 0) . '%'])></div>
                                </div>
                            </div>
                        @else
                            <div class="w-full mt-4 pt-4 border-t border-border flex justify-end">
                                <span class="text-[10px] font-bold text-success uppercase tracking-widest border border-success/20 bg-success/10 px-3 py-1 rounded-lg shadow-sm">{{ __('Verified') }} ✓</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>

    {{-- ── LIGHTBOX OVERLAY ── --}}
    <div x-show="lightbox"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click.self="lightbox = false"
         @keydown.escape.window="lightbox = false"
         class="fixed inset-0 z-[200] bg-black/80 backdrop-blur-md flex items-center justify-center p-4">

        <div class="relative max-w-4xl w-full"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100">

            {{-- Close button --}}
            <button @click="lightbox = false"
                    class="absolute -top-12 right-0 w-10 h-10 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/20 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            {{-- Image --}}
            <img :src="lightboxSrc" :alt="lightboxTitle"
                 class="w-full max-h-[80vh] object-contain rounded-2xl shadow-2xl border border-white/10">

            {{-- Title --}}
            <p class="text-center text-white/70 text-sm font-medium mt-4 tracking-wide" x-text="lightboxTitle"></p>
        </div>
    </div>
</section>
