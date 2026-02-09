<x-app-layout>

    {{-- HERO --}}
    <section class="py-24 text-center">
        <h1 class="text-5xl font-bold text-blue-300 mb-6 drop-shadow-lg">
            Hello, I'm Fahri
        </h1>

        <p class="max-w-2xl mx-auto text-blue-100/80 text-lg">
            Laravel Developer crafting elegant and responsive web experiences
            inspired by the aesthetics of Fontaine — fluid, clean and refined.
        </p>

        <div class="mt-10">
            <a href="#projects"
               class="px-7 py-3 rounded-xl bg-blue-500/80 hover:bg-blue-400 transition shadow-xl shadow-blue-900/40">
                Explore My Works
            </a>
        </div>
    </section>


    {{-- ABOUT --}}
    <section id="about" class="py-24">
        <h2 class="text-3xl font-semibold text-blue-300 mb-6">About Me</h2>

        <div class="bg-white/5 backdrop-blur-lg border border-blue-300/20 p-8 rounded-2xl text-blue-100/80 leading-relaxed">
            I build Laravel applications such as dashboards, school systems, and
            modern responsive websites. I focus on clean architecture, readable
            code and smooth user experience.
        </div>
    </section>


    {{-- PROJECTS --}}
    <section id="projects" class="py-24">
        <h2 class="text-3xl font-semibold text-blue-300 mb-10">Projects</h2>

        <div class="grid md:grid-cols-3 gap-8">

            {{-- Card --}}
            <div class="bg-white/5 backdrop-blur-xl border border-blue-300/20 p-6 rounded-2xl hover:scale-105 transition duration-300 shadow-lg shadow-blue-900/30">
                <h3 class="text-xl font-semibold text-blue-200 mb-3">School System</h3>
                <p class="text-blue-100/70 text-sm">
                    Student management system using Laravel MVC architecture.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-blue-300/20 p-6 rounded-2xl hover:scale-105 transition duration-300 shadow-lg shadow-blue-900/30">
                <h3 class="text-xl font-semibold text-blue-200 mb-3">Car Rental Website</h3>
                <p class="text-blue-100/70 text-sm">
                    Booking & admin dashboard with authentication and CRUD features.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-blue-300/20 p-6 rounded-2xl hover:scale-105 transition duration-300 shadow-lg shadow-blue-900/30">
                <h3 class="text-xl font-semibold text-blue-200 mb-3">Portfolio Website</h3>
                <p class="text-blue-100/70 text-sm">
                    Personal portfolio built using Laravel Breeze & Tailwind.
                </p>
            </div>

        </div>
    </section>


    {{-- CONTACT --}}
    <section id="contact" class="py-24 text-center">
        <h2 class="text-3xl font-semibold text-blue-300 mb-6">Contact</h2>

        <div class="bg-white/5 backdrop-blur-lg border border-blue-300/20 p-8 rounded-2xl inline-block">
            <p class="text-blue-100/80">fahri@example.com</p>
        </div>
    </section>

</x-app-layout>