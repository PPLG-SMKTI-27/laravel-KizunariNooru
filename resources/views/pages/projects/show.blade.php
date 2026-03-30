@extends('layouts.app')
@section('title', $project->title . ' - Project Details')

@section('content')
<div class="relative bg-bg min-h-screen transition-colors duration-700 pb-24">

    {{-- Full Width Hero --}}
    <div class="relative w-full h-[60vh] min-h-[400px] overflow-hidden group">
        @if($project->image)
            <img id="hero-parallax-img" src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-[120%] object-cover absolute -top-[10%] left-0">
        @else
            <div class="w-full h-full bg-container flex items-center justify-center">
                <span class="font-cinzel text-3xl text-muted opacity-30">No Hero Image</span>
            </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-bg via-bg/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-bg via-bg/20 to-transparent"></div>

        {{-- Hero Content --}}
        <div class="absolute bottom-0 left-0 w-full p-8 md:p-16 z-10">
            <div class="max-w-6xl mx-auto gsap-reveal">
                @if($project->category)
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 backdrop-blur-md border border-primary/30 text-primary text-xs font-bold uppercase tracking-[0.2em] mb-4">
                        {{ $project->category }}
                    </span>
                @endif
                <h1 class="font-cinzel text-5xl md:text-7xl font-black text-text mb-4 leading-tight drop-shadow-xl">
                    {{ $project->title }}
                </h1>
                
                {{-- Action Links --}}
                <div class="flex flex-wrap gap-4 mt-8">
                    @if($project->demo)
                        <a href="{{ $project->demo }}" target="_blank" class="magnetic-btn px-8 py-4 bg-primary text-white rounded-2xl font-bold text-sm tracking-widest uppercase hover:scale-105 transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                            <span>Live Demo</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    @endif
                    @if($project->github)
                        <a href="{{ $project->github }}" target="_blank" class="magnetic-btn px-8 py-4 bg-surface/40 backdrop-blur-md border border-border text-text rounded-2xl font-bold text-sm tracking-widest uppercase hover:bg-surface/80 transition-all flex items-center gap-2">
                            <span>Source Code</span>
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
                    Overview
                </h2>
                <p id="overview-text" class="text-muted text-lg leading-relaxed font-light">
                    {{ $project->description }}
                </p>
            </section>

            {{-- Challenge, Solution, Result --}}
            <div class="grid md:grid-cols-3 gap-6 gsap-stagger">
                @foreach([
                    ['title' => 'The Challenge', 'content' => $project->challenge, 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'color' => 'warning'],
                    ['title' => 'The Solution', 'content' => $project->solution, 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'primary'],
                    ['title' => 'The Result', 'content' => $project->result, 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'success']
                ] as $section)
                    @if($section['content'])
                    <div class="p-8 bg-surface/40 backdrop-blur-xl border border-border rounded-[2rem] hover:border-{{$section['color']}}/50 transition-colors duration-500 shadow-xl relative overflow-hidden group">
                        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-{{$section['color']}}/10 blur-2xl rounded-full group-hover:bg-{{$section['color']}}/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 rounded-2xl bg-{{$section['color']}}/10 border border-{{$section['color']}}/20 flex items-center justify-center text-{{$section['color']}} mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{$section['icon']}}"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-text mb-3 font-cinzel">{{ $section['title'] }}</h3>
                            <p class="text-sm text-muted leading-relaxed font-light">{{ $section['content'] }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            {{-- Image Gallery --}}
            @if($project->image_desktop || $project->image_mobile)
            <section class="gsap-reveal bg-surface/20 rounded-[3rem] p-8 border border-border mt-16 shadow-2xl overflow-hidden relative">
                <div class="absolute inset-0 bg-primary/5 blur-3xl rounded-full"></div>
                <h2 class="text-xs font-bold uppercase tracking-[0.3em] text-primary mb-8 flex items-center gap-4 relative z-10">
                    <span class="w-8 h-[2px] bg-primary"></span>
                    Mockups
                </h2>
                <div class="relative flex justify-center items-end gap-0 md:gap-8 z-10">
                    {{-- Desktop Mockup --}}
                    @if($project->image_desktop)
                        <div class="relative w-[300px] md:w-[600px] bg-border p-2 md:p-3 rounded-t-2xl shadow-2xl z-10 border border-border">
                            <div class="w-full bg-surface rounded-t-xl overflow-hidden border border-border">
                                <div class="bg-container h-4 md:h-6 w-full flex items-center px-2 gap-1 border-b border-border">
                                    <span class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-danger/80"></span>
                                    <span class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-warning/80"></span>
                                    <span class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-success/80"></span>
                                </div>
                                <img src="{{ Storage::url($project->image_desktop) }}" class="w-full object-cover">
                            </div>
                        </div>
                    @endif
                    
                    {{-- Mobile Mockup --}}
                    @if($project->image_mobile)
                        <div class="absolute right-0 -bottom-4 md:bottom-0 md:relative w-[120px] md:w-[200px] bg-border p-2 rounded-[2rem] shadow-2xl border-4 border-container z-20">
                            <div class="w-full bg-surface rounded-[1.5rem] overflow-hidden">
                                <img src="{{ Storage::url($project->image_mobile) }}" class="w-full object-cover">
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
            <div class="p-8 bg-surface/50 backdrop-blur-xl border border-border rounded-[2.5rem] shadow-xl gsap-reveal">
                <h3 class="font-cinzel text-xl font-bold text-text mb-6">Technologies</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach(explode(',', $project->tech) as $t)
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
            <div class="p-8 bg-surface/50 backdrop-blur-xl border border-border rounded-[2.5rem] shadow-xl gsap-reveal">
                <h3 class="font-cinzel text-xl font-bold text-text mb-6">Key Features</h3>
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
