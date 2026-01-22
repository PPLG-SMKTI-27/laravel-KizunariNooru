@extends('layouts.app')
@section('title','Contact')

@section('content')
<section class="container mx-auto px-6 pt-32 max-w-3xl">

    <h1 class="text-4xl font-serif text-sky-300 mb-10">
        Contact Me
    </h1>

    <div class="space-y-6">
        <a href="mailto:youremail@gmail.com"
           class="block bg-white/5 p-6 rounded-2xl hover:bg-sky-400/10 transition">
            📧 youremail@gmail.com
        </a>

        <a href="https://wa.me/628xxxx"
           class="block bg-white/5 p-6 rounded-2xl hover:bg-sky-400/10 transition">
            💬 WhatsApp
        </a>

        <a href="https://github.com/username"
           class="block bg-white/5 p-6 rounded-2xl hover:bg-sky-400/10 transition">
            💻 GitHub
        </a>

        <a href="https://linkedin.com/in/username"
           class="block bg-white/5 p-6 rounded-2xl hover:bg-sky-400/10 transition">
            🔗 LinkedIn
        </a>
    </div>

</section>
@endsection
