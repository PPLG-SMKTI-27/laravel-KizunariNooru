{{-- ══════════════════════════════════════════════════════
     CERTIFICATES SECTION — DB-DRIVEN
══════════════════════════════════════════════════════ --}}
<section id="certificates" class="py-24 relative overflow-hidden bg-bg transition-colors duration-700"
    x-data="{ activeTab: 'Programming' }">

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
                     class="group bg-surface/40 backdrop-blur-xl border border-border hover:border-primary/40 rounded-[2rem] p-6 shadow-xl relative overflow-hidden flex flex-col items-start transition-all duration-300">

                    <div class="absolute -right-10 -top-10 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all duration-500"></div>

                    <div class="w-14 h-14 rounded-[1.2rem] {{ $cert->progress == 100 ? 'bg-success/10 text-success border border-success/20' : 'bg-bg border border-border text-primary' }} flex items-center justify-center mb-6 shadow-inner ring-[6px] ring-transparent group-hover:ring-primary/5 transition-all">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cert->icon_svg ?? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' }}"/></svg>
                    </div>

                    <div class="flex-grow w-full">
                        <h3 class="text-lg font-bold text-text group-hover:text-primary transition-colors leading-tight mb-1">{{ __($cert->title) }}</h3>
                        <p class="text-xs font-bold text-muted uppercase tracking-widest mb-1">{{ __($cert->issuer) }}</p>

                        <div class="inline-flex items-center gap-1.5 px-2 py-1 rounded bg-bg border border-border text-[9px] uppercase tracking-widest font-bold {{ $cert->progress == 100 ? 'text-success' : 'text-muted' }} mt-2">
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
                        <div class="w-full mt-6">
                            <div class="flex justify-between items-center text-[10px] font-bold uppercase text-muted mb-2">
                                <span>{{ __('Currently Learning') }}</span>
                                <span class="text-primary">{{ $cert->progress }}%</span>
                            </div>
                            <div class="w-full h-1 bg-border rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-primary-2 rounded-full" style="width: {{ $cert->progress }}%"></div>
                            </div>
                        </div>
                    @else
                        <div class="w-full mt-6 pt-4 border-t border-border flex justify-end">
                            <span class="text-[10px] font-bold text-success uppercase tracking-widest border border-success/20 bg-success/10 px-3 py-1 rounded-lg shadow-sm">{{ __('Verified') }} ✓</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
