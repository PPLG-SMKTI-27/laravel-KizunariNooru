@extends('layouts.app')
@section('title','About Me')

@section('content')
<section class="container mx-auto px-6 pt-32 reveal">

    <h1 class="text-4xl font-serif mb-10 text-sky-300">About Me</h1>

    <p class="max-w-3xl text-slate-200 leading-relaxed mb-16">
        Saya adalah Web Developer yang fokus pada Laravel,
        UI modern, dan pengalaman pengguna yang bersih.
    </p>

    <!-- EXPERIENCE -->
    <h2 class="text-2xl font-serif mb-6">Experience</h2>
    <div class="space-y-6 mb-16">
        @foreach($experiences as $exp)
        <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
            <span class="text-sky-300 text-sm">{{ $exp['year'] }}</span>
            <h3 class="text-xl">{{ $exp['title'] }}</h3>
            <p class="text-slate-300">{{ $exp['desc'] }}</p>
        </div>
        @endforeach
    </div>

    <!-- SKILLS -->
    <h2 class="text-2xl font-serif mb-6">Skills</h2>
    <div class="flex flex-wrap gap-4">
        @foreach($skills as $skill)
        <span class="px-5 py-2 rounded-full bg-sky-400/20 text-sky-200">
            {{ $skill }}
        </span>
        @endforeach
    </div>

</section>
@endsection
