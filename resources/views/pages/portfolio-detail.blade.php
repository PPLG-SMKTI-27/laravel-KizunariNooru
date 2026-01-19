@extends('layouts.app')
@section('title', $project['title'])

@section('content')
<section class="container mx-auto px-6 py-24">

    <a href="/portfolio"
       class="text-blue-400 hover:text-blue-300 text-sm inline-block mb-6">
        ← Back to All Projects
    </a>

    <h1 class="text-5xl font-serif text-yellow-300 mb-6">
        {{ $project['title'] }}
    </h1>

    <div class="h-80 rounded-xl bg-gradient-to-br
                from-blue-600 to-indigo-900 mb-10"></div>

    <p class="max-w-3xl text-gray-300 leading-relaxed mb-10">
        {{ $project['description'] }}
    </p>

    <h3 class="text-2xl font-serif text-yellow-300 mb-4">
        Tech Stack
    </h3>

    <div class="flex flex-wrap gap-3">
        @foreach ($project['tech'] as $tech)
        <span class="px-4 py-1 border border-blue-400
                     text-blue-300 rounded-full">
            {{ $tech }}
        </span>
        @endforeach
    </div>

</section>
@endsection
