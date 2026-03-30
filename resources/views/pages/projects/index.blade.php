@extends('layouts.app')
@section('title', 'Projects')

@section('content')
<div class="pt-32 pb-20 relative min-h-screen bg-bg transition-colors duration-700">
    {{-- Background Fluid Elements --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/10 blur-[120px] rounded-full animate-liquid pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-80 h-80 bg-primary-2/5 blur-[100px] rounded-full animate-liquid pointer-events-none" style="animation-delay: -3s"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        {{-- Header Section --}}
        <div class="gsap-reveal mb-12 flex flex-col items-center text-center">
            <span class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-[10px] font-bold uppercase tracking-[0.3em] mb-4">
                Directory
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-text mb-6 font-display leading-tight tracking-tight">
                Selected <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">Projects</span>
            </h1>
            <p class="text-muted text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                An archive of digital solutions, web applications, and technical experiments crafted with precision and elegance.
            </p>
        </div>

        {{-- Filters & Search --}}
        <div class="gsap-reveal mb-12 flex flex-col md:flex-row gap-6 justify-between items-center">
            
            {{-- Filter Tabs --}}
            <div class="flex flex-wrap justify-center gap-2 p-1.5 bg-surface/40 backdrop-blur-md rounded-2xl border border-white/10 shadow-lg">
                @php
                    $categories = ['All', 'Web App', 'System', 'Experiment'];
                    $currentCategory = request('category', 'All');
                @endphp
                @foreach($categories as $cat)
                    <a href="{{ route('public.projects.index', array_merge(request()->query(), ['category' => $cat])) }}" 
                       class="px-5 py-2 rounded-xl text-xs font-bold transition-all duration-300 {{ $currentCategory == $cat ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-muted hover:bg-white/10 hover:text-text' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            {{-- Search Bar --}}
            <form action="{{ route('public.projects.index') }}" method="GET" class="w-full md:w-auto relative group">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative flex items-center bg-surface/50 backdrop-blur-xl border border-border group-hover:border-primary/50 transition-colors p-1.5 rounded-2xl shadow-md w-full md:w-[300px]">
                    <div class="px-3 text-muted">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects..."
                        class="w-full bg-transparent border-none text-text placeholder-muted/60 text-sm focus:ring-0 focus:outline-hidden px-2 py-1.5">
                    <button type="submit" class="px-4 py-1.5 bg-bg border border-border text-text hover:bg-primary hover:text-white hover:border-primary rounded-xl text-xs font-bold transition-all">
                        Search
                    </button>
                </div>
            </form>
        </div>

        {{-- Active Filters indicator --}}
        @if((request()->has('search') && request('search') != '') || (request('category') && request('category') != 'All'))
            <div class="gsap-reveal flex items-center justify-between mb-8 pb-4 border-b border-border/50">
                <div class="text-xs font-bold text-muted uppercase tracking-widest">
                    Showing {{ $projects->count() }} Results
                </div>
                <div class="flex items-center gap-3">
                    @if(request('search'))
                        <div class="text-[10px] font-bold text-primary uppercase tracking-widest bg-primary/10 px-3 py-1 rounded-full border border-primary/20 flex items-center">
                            Search: "{{ request('search') }}"
                        </div>
                    @endif
                    <a href="{{ route('public.projects.index') }}" class="text-[10px] font-bold text-danger uppercase tracking-widest hover:text-danger/70 transition-colors flex items-center gap-1 bg-danger/10 px-3 py-1 rounded-full border border-danger/20">
                        Clear Filters <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                </div>
            </div>
        @endif

        {{-- Projects Grid --}}
        <div class="gsap-stagger grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="group relative bg-surface/50 backdrop-blur-xl rounded-[2rem] border border-border hover:border-primary/50 transition-all duration-500 overflow-hidden flex flex-col hover:-translate-y-2 hover:shadow-2xl shadow-lg">
                    
                    {{-- Thumbnail --}}
                    <div class="relative h-48 sm:h-56 overflow-hidden bg-bg">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-container text-muted">
                                <span class="font-display text-lg opacity-30">No Image</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-surface via-surface/20 to-transparent opacity-80 group-hover:opacity-40 transition-opacity duration-500"></div>
                        
                        {{-- Category Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full bg-surface/80 backdrop-blur-md border border-white/20 text-[10px] font-bold uppercase tracking-widest text-primary shadow-sm">
                                {{ $project->category ?? 'Project' }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex flex-col grow relative z-10 -mt-6">
                        
                        <div class="bg-surface/90 backdrop-blur-xl rounded-2xl p-5 border border-white/20 shadow-xl grow flex flex-col">
                            <h3 class="text-xl font-bold text-text mb-2 font-display tracking-tight group-hover:text-primary transition-colors duration-300">
                                {{ $project->title }}
                            </h3>
                            
                            <p class="text-muted text-sm leading-relaxed mb-6 line-clamp-3 font-light">
                                {{ $project->description }}
                            </p>

                            {{-- Tech Icons --}}
                            @if($project->tech)
                                <div class="flex flex-wrap gap-2 mb-6 mt-auto">
                                    @foreach($project->tech_array as $t)
                                        <span class="px-2.5 py-1.5 rounded-xl bg-bg border border-border text-[9px] font-bold text-muted uppercase tracking-widest transition-all">
                                            {{ trim($t) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Action Buttons --}}
                            <div class="flex gap-3 justify-between items-center pt-4 border-t border-border mt-auto">
                                <a href="{{ route('public.projects.show', $project) }}" class="flex-1 text-center py-2.5 bg-primary/10 hover:bg-primary text-primary hover:text-white rounded-xl text-[11px] font-bold uppercase tracking-widest transition-all duration-300">
                                    View Details
                                </a>
                                @if($project->demo)
                                    <a href="{{ $project->demo }}" target="_blank" aria-label="Lihat Live Demo" class="w-10 h-10 rounded-xl bg-bg border border-border flex items-center justify-center text-muted hover:text-primary transition-colors duration-300 shrink-0" title="Live Demo">
                                        <x-icons.link class="w-4 h-4" />
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-surface/30 backdrop-blur-md rounded-[2rem] border border-border border-dashed">
                    <div class="w-16 h-16 rounded-2xl bg-bg border border-border flex items-center justify-center text-muted mx-auto mb-4">
                        <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-text mb-2">No Projects Found</h3>
                    <p class="text-muted text-sm max-w-md mx-auto">We couldn't find any projects matching your current filters. Try adjusting your search or category selection.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
