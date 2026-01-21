@extends('layouts.app')
@section('title', $project['title'])

@section('content')
<section class="container mx-auto px-6 py-28">

    <a href="/portfolio"
       class="text-sky-400 hover:text-sky-300
              text-sm font-medium inline-flex items-center gap-2
              mb-10 transition">
        ← Back to All Projects
    </a>

    <h1 class="text-5xl md:text-6xl font-serif
               text-white drop-shadow-[0_0_25px_rgba(56,189,248,0.6)]
               mb-8">
        {{ $project['title'] }}
    </h1>

    <!-- Hero Image / Preview -->
    <div class="h-80 rounded-2xl mb-12
                bg-gradient-to-br
                from-sky-300 via-blue-400 to-indigo-600
                shadow-[0_0_60px_rgba(56,189,248,0.4)]
                ring-1 ring-white/30">
    </div>

    <p class="max-w-3xl text-slate-200
              leading-relaxed text-lg mb-14">
        {{ $project['description'] }}
    </p>

    <h3 class="text-2xl font-serif
               text-white mb-6
               drop-shadow-[0_0_15px_rgba(147,197,253,0.6)]">
        Tech Stack
    </h3>

    <div class="flex flex-wrap gap-4">
        @foreach ($project['tech'] as $tech)
        <span
            class="px-5 py-1.5 rounded-full text-sm
                   bg-white/10 text-sky-200
                   border border-sky-300/40
                   backdrop-blur-md
                   shadow-[0_0_15px_rgba(56,189,248,0.25)]
                   hover:bg-white/20
                   transition">
            {{ $tech }}
        </span>
        @endforeach
    </div>

</section>
@endsection
