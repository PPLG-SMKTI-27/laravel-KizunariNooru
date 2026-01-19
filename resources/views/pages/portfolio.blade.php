@extends('layouts.app')
@section('title', 'All Projects')

@section('content')
<section class="container mx-auto px-6 py-24">

    <h1 class="text-5xl font-serif text-yellow-300 mb-12">
        All Projects
    </h1>

    <div class="grid md:grid-cols-3 gap-10">
        @foreach ($projects as $project)
        <a href="/portfolio/{{ $project['id'] }}"
           class="group bg-slate-800 rounded-xl overflow-hidden
                  hover:shadow-2xl hover:shadow-blue-500/30 transition">

            <div class="h-48 bg-gradient-to-br from-blue-600 to-indigo-900"></div>

            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2">
                    {{ $project['title'] }}
                </h3>

                <p class="text-sm text-gray-400">
                    {{ $project['description'] }}
                </p>
            </div>
        </a>
        @endforeach
    </div>

</section>
@endsection
