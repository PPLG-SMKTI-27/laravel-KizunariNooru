@extends('layouts.app')
@section('title','Portfolio')

@section('content')

<!-- HOME -->
<section id="home" class="min-h-screen flex items-center container mx-auto px-6 pt-32">
    <div class="grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h1 class="text-5xl md:text-7xl font-serif text-sky-300">
                Rusherimfa
            </h1>
            <p class="mt-6 text-slate-200 text-lg">
                Web Developer • Laravel • UI Designer
            </p>
            <x-social-links />
        </div>

        <!-- FOTO -->
        <div class="relative flex justify-center md:justify-end">
            <div class="absolute -right-10 w-72 h-72 bg-sky-400/20 blur-3xl rounded-full"></div>
            <img
                src="{{ asset('img/Furina1.jpg') }}"
                class="relative w-64 h-64 md:w-96 md:h-96 rounded-full object-cover
                       border-4 border-sky-300/50 animate-float"
            >
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-32 container mx-auto px-6">
    <h2 class="section-title">About Me</h2>
    <p class="max-w-3xl text-slate-200 leading-relaxed">
        Saya adalah Web Developer yang fokus pada Laravel, UI modern,
        dan pengalaman pengguna yang bersih.
    </p>
</section>

<!-- SKILLS -->
<section id="skills" class="py-32 bg-white/5">
    <div class="container mx-auto px-6">
        <h2 class="section-title">Skills</h2>
        <div class="flex flex-wrap gap-4 mt-10">
            @foreach(['Laravel','PHP','Tailwind','JavaScript','MySQL'] as $skill)
                <span class="skill-pill">{{ $skill }}</span>
            @endforeach
        </div>
    </div>
</section>

<!-- PROJECTS -->
<section id="projects" class="py-32 container mx-auto px-6">
    <h2 class="section-title">Projects</h2>

    <div class="grid md:grid-cols-3 gap-8 mt-10">
        <div class="project-card">Project One</div>
        <div class="project-card">Project Two</div>
        <div class="project-card">Project Three</div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-32 bg-white/5">
    <div class="container mx-auto px-6 max-w-3xl">
        <h2 class="section-title">Contact</h2>

        <div class="space-y-6 mt-10">
            <a href="mailto:email@gmail.com" class="contact-item">Email</a>
            <a href="https://wa.me/628xxxx" class="contact-item">WhatsApp</a>
            <a href="https://github.com" class="contact-item">GitHub</a>
        </div>
    </div>
</section>

@endsection

