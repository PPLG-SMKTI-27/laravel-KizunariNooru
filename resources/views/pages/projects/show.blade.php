@extends('layouts.app')
@section('title', $project->title . ' - Project Details')

@section('content')
<div class="relative bg-bg min-h-screen transition-colors duration-700 pb-24">

    {{-- Full Width Hero --}}
    <div class="relative w-full h-[60vh] min-h-[400px] overflow-hidden group">
        @if($project->image)
            <img id="hero-parallax-img" src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-[120%] object-cover absolute -top-[10%] left-0 opacity-70 mix-blend-screen grayscale-[30%]">
        @else
            <div class="w-full h-full max-h-[500px] overflow-y-auto mockup-screen-scroll bg-container flex items-center justify-center">
                <span class="font-display text-3xl text-muted opacity-30">Tidak Ada Gambar Utama</span>
            </div>
        @endif
        
        {{-- Matrix Grid Overlay --}}
        <div class="absolute inset-0 z-0 opacity-10 pointer-events-none" style="background-image: linear-gradient(rgba(34,211,238,0.2) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.2) 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-bg via-bg/80 to-transparent pointer-events-none z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-bg via-bg/30 to-transparent pointer-events-none z-10"></div>

        {{-- Hero Content --}}
        <div class="absolute bottom-0 left-0 w-full p-8 md:p-16 z-10">
            <div class="max-w-6xl mx-auto gsap-reveal">
                @if($project->category)
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 backdrop-blur-md border border-primary/30 text-primary text-xs font-bold uppercase tracking-[0.2em] mb-4">
                        {{ $project->category }}
                    </span>
                @endif
                <h1 class="font-display text-5xl md:text-7xl font-black text-text mb-4 leading-tight drop-shadow-xl">
                    {{ $project->title }}
                </h1>
                
                {{-- Action Links --}}
                <div class="flex flex-wrap gap-4 mt-8">
                    @if($project->demo)
                        <a href="{{ $project->demo }}" target="_blank" aria-label="Lihat Demo Langsung" class="magnetic-btn px-8 py-4 bg-primary text-white rounded-2xl font-bold text-sm tracking-widest uppercase hover:scale-105 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                            <span>Demo Langsung</span>
                            <x-icons.link class="w-4 h-4" stroke-width="2.5" />
                        </a>
                    @endif
                    @if($project->github)
                        <a href="{{ $project->github }}" target="_blank" class="magnetic-btn px-8 py-4 bg-surface/40 backdrop-blur-md border border-border text-text rounded-2xl font-bold text-sm tracking-widest uppercase hover:bg-surface/80 transition-all flex items-center gap-2">
                            <span>Kode Sumber</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="max-w-6xl mx-auto px-6 mt-16 grid grid-cols-1 lg:grid-cols-3 gap-16">
        
        {{-- Left Column: Project Details --}}
        <div class="lg:col-span-2 space-y-16">
            
            {{-- Overview --}}
            <section class="gsap-reveal">
                <h2 class="text-xs font-bold uppercase tracking-[0.3em] text-primary mb-6 flex items-center gap-4">
                    <span class="w-8 h-[2px] bg-primary"></span>
                    Ringkasan
                </h2>
                <p id="overview-text" class="text-muted text-lg leading-relaxed font-light">
                    {{ $project->description }}
                </p>
            </section>

            {{-- Challenge, Solution, Result --}}
            <div class="grid md:grid-cols-3 gap-6 gsap-stagger">
                @foreach([
                    ['title' => 'Tantangan', 'content' => $project->challenge, 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'color' => 'warning'],
                    ['title' => 'Solusi', 'content' => $project->solution, 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'primary'],
                    ['title' => 'Hasil', 'content' => $project->result, 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'success']
                ] as $section)
                    @if($section['content'])
                    <div class="p-8 bg-surface/30 backdrop-blur-xl border border-white/5 rounded-[2rem] hover:border-{{$section['color']}}/50 hover:bg-surface/50 transition-all duration-500 shadow-2xl relative overflow-hidden group transform-gpu">
                        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-{{$section['color']}}/10 blur-3xl rounded-full group-hover:bg-{{$section['color']}}/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 rounded-2xl bg-{{$section['color']}}/10 border border-{{$section['color']}}/20 flex items-center justify-center text-{{$section['color']}} mb-6 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{$section['icon']}}"/></svg>
                            </div>
                            <h3 class="text-xl font-bold text-text mb-3 font-display">{{ $section['title'] }}</h3>
                            <p class="text-sm text-muted leading-relaxed font-light">{{ $section['content'] }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            {{-- Image Gallery --}}
            @if($project->image_desktop || $project->image_tablet || $project->image_mobile)
            <section class="gsap-reveal bg-surface/20 rounded-[2.5rem] p-6 md:p-8 border border-border mt-16 shadow-2xl overflow-hidden relative">
                <div class="absolute inset-0 bg-primary/5 blur-3xl rounded-full"></div>
                <h2 class="text-xs font-bold uppercase tracking-[0.3em] text-primary mb-8 flex items-center gap-4 relative z-10">
                    <span class="w-8 h-[2px] bg-primary"></span>
                    Mockups
                </h2>
                <div class="relative flex flex-row justify-center items-end gap-2 md:gap-4 z-10 pt-4 pb-4">
                    {{-- Desktop Mockup --}}
                    @if($project->image_desktop)
                        <div class="relative w-[200px] md:w-[380px] bg-surface/40 backdrop-blur-xl p-1.5 md:p-2 rounded-xl shadow-2xl z-10 border border-white/10 transform-gpu hover:-translate-y-2 transition-transform duration-500">
                            <div class="w-full bg-bg rounded-lg overflow-hidden border border-border shadow-inner">
                                <div class="bg-surface/50 backdrop-blur-md h-3 md:h-5 w-full flex items-center px-1.5 md:px-2 gap-1 border-b border-border">
                                    <span class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-danger/80"></span>
                                    <span class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-warning/80"></span>
                                    <span class="w-1 h-1 md:w-1.5 md:h-1.5 rounded-full bg-success/80"></span>
                                </div>
                                <img src="{{ Storage::url($project->image_desktop) }}" class="w-full h-auto object-cover object-top max-h-[150px] md:max-h-[240px]">
                            </div>
                        </div>
                    @endif
                    
                    {{-- Tablet Mockup --}}
                    @if($project->image_tablet)
                        <div class="relative w-[120px] md:w-[220px] bg-surface/50 backdrop-blur-xl p-1.5 md:p-2 rounded-[1rem] md:rounded-[1.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/20 z-20 transform-gpu -ml-8 md:-ml-12 mb-2 md:mb-4 hover:-translate-y-2 transition-transform duration-500">
                            <div class="w-full bg-bg rounded-lg md:rounded-[1rem] overflow-hidden shadow-inner border border-white/5">
                                <img src="{{ Storage::url($project->image_tablet) }}" class="w-full h-auto object-cover object-top max-h-[140px] md:max-h-[280px]">
                            </div>
                        </div>
                    @endif

                    {{-- Mobile Mockup --}}
                    @if($project->image_mobile)
                        <div class="relative w-[60px] md:w-[100px] bg-surface/60 backdrop-blur-xl p-1 md:p-1.5 rounded-xl md:rounded-[1.2rem] shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/20 z-30 transform-gpu -ml-6 md:-ml-8 mb-0 md:mb-0 hover:-translate-y-2 transition-transform duration-500">
                            <div class="w-full bg-bg rounded-md md:rounded-[0.9rem] overflow-hidden shadow-inner border border-white/5">
                                <img src="{{ Storage::url($project->image_mobile) }}" class="w-full h-auto object-cover object-top max-h-[100px] md:max-h-[180px]">
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            @endif

        </div>

        {{-- Right Column: Sidebar sidebar --}}
        <div class="space-y-8 lg:sticky lg:top-32 self-start">
            {{-- Tech Stack --}}
            @if($project->tech)
            <div class="p-8 bg-surface/30 backdrop-blur-xl border border-white/5 rounded-[2.5rem] shadow-2xl gsap-reveal hover:bg-surface/50 transition-colors duration-500">
                <h3 class="font-display text-xl font-bold text-text mb-6">Teknologi</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach($project->tech_array as $t)
                        <div class="px-4 py-2 bg-bg border border-border rounded-xl flex items-center gap-2 group hover:border-primary/50 transition-colors">
                            <div class="w-2 h-2 rounded-full bg-primary group-hover:scale-150 transition-transform"></div>
                            <span class="text-xs font-bold text-muted uppercase tracking-widest">{{ trim($t) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Key Features --}}
            @if($project->features)
            <div class="p-8 bg-surface/30 backdrop-blur-xl border border-white/5 rounded-[2.5rem] shadow-2xl gsap-reveal hover:bg-surface/50 transition-colors duration-500">
                <h3 class="font-display text-xl font-bold text-text mb-6">Fitur Utama</h3>
                <ul class="space-y-4">
                    @php 
                        $featuresDe = is_string($project->features) ? json_decode($project->features, true) : $project->features;
                    @endphp
                    @if(is_array($featuresDe))
                        @foreach($featuresDe as $feature)
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-success/10 text-success flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span class="text-muted text-sm">{{ $feature }}</span>
                            </li>
                        @endforeach
                    @else
                        {{-- In case it's just a raw text summary --}}
                        <p class="text-sm text-muted">{{ $project->features }}</p>
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function initProjectDetails() {
        if(document.getElementById('hero-parallax-img')) {
            gsap.to('#hero-parallax-img', {
                yPercent: 15,
                ease: "none",
                scrollTrigger: {
                    trigger: '#hero-parallax-img',
                    start: "top top",
                    end: "bottom top",
                    scrub: true
                }
            });
        }

        const overview = document.getElementById('overview-text');
        if(overview) {
            gsap.fromTo(overview, 
                { opacity: 0, y: 30 }, 
                { scrollTrigger: { trigger: overview, start: "top 85%" }, opacity: 1, y: 0, duration: 1.5, ease: "power4.out" }
            );
        }
        
        // Add magnetic effect to project buttons
        gsap.utils.toArray('.magnetic-btn').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                gsap.to(btn, { x: x * 0.3, y: y * 0.3, duration: 0.4, ease: 'power3.out' });
            });
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.3)' });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initProjectDetails);
    document.addEventListener('pageLoaded', initProjectDetails);
</script>
@endsection
