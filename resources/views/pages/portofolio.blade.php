<!-- ================= HOME ================= -->
<section
    id="home"
    class="relative min-h-screen flex items-center overflow-hidden"
>

    <!-- BACKGROUND GLOW -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-1/4 left-1/4 w-96 h-96
                    bg-sky-400/20 blur-3xl rounded-full"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96
                    bg-indigo-500/20 blur-3xl rounded-full"></div>
    </div>

    <!-- CODE RAIN -->
    <div class="absolute inset-0 -z-10 opacity-30 pointer-events-none">
        <div class="code-rain"></div>
    </div>

    <div class="container mx-auto px-6 pt-32">
        <div class="grid md:grid-cols-2 gap-14 items-center">

            <!-- TEXT -->
            <div class="reveal">
                <h1
                    class="text-5xl md:text-7xl font-serif text-sky-300
                           drop-shadow-[0_0_30px_rgba(56,189,248,0.7)]">
                    Rusherimfa
                </h1>

                <p class="mt-6 text-slate-300 text-lg max-w-xl">
                    Web Developer yang fokus pada Laravel,
                    UI modern, dan pengalaman pengguna
                    yang bersih & elegan.
                </p>

                <!-- CTA -->
                <div class="mt-10 flex gap-5">
                    <a href="#projects"
                       class="px-8 py-3 rounded-full
                              bg-sky-400/30 text-white
                              border border-sky-300/40
                              hover:bg-sky-400/50 transition">
                        View Projects
                    </a>

                    <a href="#contact"
                       class="px-8 py-3 rounded-full
                              border border-white/20
                              hover:border-sky-300/40 transition">
                        Contact Me
                    </a>
                </div>

                <div class="mt-10">
                    <x-social-links />
                </div>
            </div>

            <!-- FOTO -->
            <div class="relative flex justify-center md:justify-end reveal">
                <div
                    class="absolute -right-20 w-96 h-96
                           bg-sky-400/30 blur-3xl rounded-full">
                </div>

                <img
                    src="{{ asset('img/Furina1.jpg') }}"
                    class="relative w-64 h-64 md:w-96 md:h-96
                           rounded-full object-cover
                           border-4 border-sky-300/40
                           shadow-[0_0_70px_rgba(56,189,248,0.6)]
                           animate-float"
                >
            </div>

        </div>
    </div>

</section>
