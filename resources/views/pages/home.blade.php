@extends('layouts.app')
@section('title',)

@section('content')
<!-- ================= HERO / HOME ================= -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden
                bg-gradient-to-b from-sky-200 via-blue-300 to-indigo-300">

    <!-- Background Glow -->
    <div class="absolute -top-32 -left-32 w-[30rem] h-[30rem]
                bg-white/40 rounded-full blur-3xl"></div>

    <div class="absolute top-1/3 -right-40 w-[34rem] h-[34rem]
                bg-sky-400/40 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

        <!-- TEXT -->
        <div class="text-center lg:text-left">
            <span
                class="inline-flex items-center gap-2 px-4 py-1 mb-6
                       rounded-full bg-white/30 backdrop-blur
                       border border-white/40
                       text-sm text-sky-800 font-medium">
                Open for Collaboration
            </span>

            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6
                       text-white
                       drop-shadow-[0_0_40px_rgba(56,189,248,0.8)]">
                Hi, I’m
                <span class="text-indigo-700">
                    Furina
                </span>
            </h1>

            <p class="text-lg md:text-xl text-slate-700
                      font-medium max-w-xl mb-10">
                Full Stack Developer crafting elegant, modern,
                and high-performance web experiences with Laravel.
            </p>

            <!-- CTA -->
            <div class="flex gap-5 flex-wrap justify-center lg:justify-start">
                <a href="#projects"
                   class="px-8 py-3 rounded-xl
                          bg-indigo-600 text-white font-semibold
                          shadow-lg shadow-indigo-600/30
                          hover:scale-105 transition">
                    View Projects
                </a>

                <a href="#contact"
                   class="px-8 py-3 rounded-xl
                          border border-indigo-600
                          text-indigo-700 font-semibold
                          hover:bg-indigo-600 hover:text-white
                          transition">
                    Contact Me
                </a>
            </div>

            <!-- Social -->
            <div class="mt-10 flex gap-4 justify-center lg:justify-start">
                <a href="https://github.com/Fadlan079" target="_blank"
                   class="social-btn bg-white/40 text-slate-700 hover:text-indigo-700">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/fadlan-firdaus-148344386/" target="_blank"
                   class="social-btn bg-white/40 text-slate-700 hover:text-indigo-700">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="https://instagram.com/fdln007" target="_blank"
                   class="social-btn bg-white/40 text-slate-700 hover:text-indigo-700">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="mailto:fadlanfirdaus220@gmail.com"
                   class="social-btn bg-white/40 text-slate-700 hover:text-indigo-700">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                <a href="https://wa.me/6282210732928" target="_blank"
                   class="social-btn bg-white/40 text-slate-700 hover:text-indigo-700">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- OPTIONAL RIGHT SIDE (Glow Card / Illustration Placeholder) -->
        <div class="hidden lg:block relative">
            <div class="h-96 rounded-3xl
                        bg-gradient-to-br from-white/40 to-sky-300/40
                        backdrop-blur-xl
                        border border-white/50
                        shadow-[0_0_60px_rgba(56,189,248,0.4)]">
            </div>
        </div>

    </div>
</section>
@endsection
