@extends('layouts.app')
@section('title', 'Home')

@section('content')

<!-- ================= HERO / HOME ================= -->
<section class="min-h-screen flex items-center justify-center
                bg-gradient-to-b from-slate-900 to-blue-950">

    <div class="text-center px-6">
        <h1 class="text-6xl md:text-7xl font-serif text-yellow-300 mb-6">
            Furina Portfolio
        </h1>

        <p class="text-blue-300 mb-10 max-w-xl mx-auto">
            Elegant Laravel Portfolio inspired by Furina & Fontaine
        </p>

        <div class="flex justify-center gap-6">
            <a href="/portfolio"
               class="px-8 py-3 border border-yellow-400 text-yellow-300
                      hover:bg-yellow-400 hover:text-black transition">
                View Projects
            </a>

            <a href="#contact"
               class="px-8 py-3 border border-blue-400 text-blue-300
                      hover:bg-blue-400 hover:text-black transition">
                Contact Me
            </a>
        </div>
    </div>

</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="relative container mx-auto px-6 py-32">

    <!-- glow -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-600/20 rounded-full blur-3xl"></div>
    <div class="absolute top-40 -right-20 w-72 h-72 bg-indigo-600/20 rounded-full blur-3xl"></div>

    <div class="relative grid md:grid-cols-2 gap-16 items-center">

        <!-- text -->
        <div>
            <h2 class="text-5xl font-serif text-yellow-300 mb-6">
                About Me
            </h2>

            <p class="text-gray-300 leading-relaxed mb-6">
                Saya adalah web developer yang fokus pada desain
                <span class="text-blue-300">elegan</span>,
                <span class="text-blue-300">modern</span>,
                dan performa tinggi.
                Terinspirasi oleh keindahan dan drama ala
                <span class="text-yellow-300">Furina</span>.
            </p>

            <p class="text-gray-400 text-sm max-w-xl">
                Menggunakan Laravel sebagai fondasi utama,
                dengan pendekatan clean code dan UI profesional.
            </p>
        </div>

        <!-- info card -->
        <div class="bg-slate-800/70 backdrop-blur rounded-xl p-8 border border-slate-700">
            <ul class="space-y-4 text-sm">
                <li class="flex justify-between">
                    <span class="text-gray-400">Role</span>
                    <span>Web Developer</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Stack</span>
                    <span>Laravel & Tailwind</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Focus</span>
                    <span>Elegant UI / UX</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Theme</span>
                    <span class="text-yellow-300">Furina Inspired</span>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="container mx-auto px-6 py-32">

    <h2 class="text-5xl font-serif text-yellow-300 mb-12">
        Contact Me
    </h2>

    <div class="max-w-xl bg-slate-800/70 backdrop-blur
                p-8 rounded-xl border border-slate-700">

        <form class="space-y-6">
            <input type="text" placeholder="Your Name"
                   class="w-full bg-slate-900 border border-slate-700
                          px-4 py-3 rounded focus:outline-none
                          focus:border-blue-400">

            <input type="email" placeholder="Email Address"
                   class="w-full bg-slate-900 border border-slate-700
                          px-4 py-3 rounded focus:outline-none
                          focus:border-blue-400">

            <textarea rows="4" placeholder="Message"
                      class="w-full bg-slate-900 border border-slate-700
                             px-4 py-3 rounded focus:outline-none
                             focus:border-blue-400"></textarea>

            <button type="submit"
                    class="px-8 py-3 border border-yellow-400 text-yellow-300
                           hover:bg-yellow-400 hover:text-black transition">
                Send Message
            </button>
        </form>

    </div>
</section>

@endsection
