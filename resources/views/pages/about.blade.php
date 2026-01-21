@vite('resources/css/app.css')

<section id="about"
    class="relative container mx-auto px-6 py-36
           bg-gradient-to-b from-sky-200 via-blue-200 to-indigo-200
           overflow-hidden">

    <!-- Decorative Water Glow -->
    <div class="absolute -top-32 -left-32 w-[28rem] h-[28rem]
                bg-sky-400/30 rounded-full blur-3xl"></div>

    <div class="absolute top-40 -right-32 w-[28rem] h-[28rem]
                bg-blue-500/30 rounded-full blur-3xl"></div>

    <div class="relative grid md:grid-cols-2 gap-20 items-center">

        <!-- TEXT -->
        <div>
            <h2 class="text-5xl md:text-6xl font-serif
                       text-white mb-8
                       drop-shadow-[0_0_30px_rgba(56,189,248,0.7)]">
                About Me
            </h2>

            <p class="text-slate-700 text-lg leading-relaxed mb-6">
                Saya adalah web developer yang fokus pada desain
                <span class="text-sky-600 font-medium"> elegan</span>,
                <span class="text-sky-600 font-medium"> modern</span>,
                dan performa tinggi.
                Terinspirasi oleh keindahan dan drama ala
                <span class="text-indigo-700 font-semibold"> Furina</span>.
            </p>

            <p class="text-slate-600 text-sm max-w-xl">
                Saya mengembangkan website menggunakan Laravel
                dengan pendekatan clean code, UI profesional,
                dan pengalaman pengguna yang premium.
            </p>
        </div>

        <!-- INFO CARD -->
        <div
            class="relative bg-white/20 backdrop-blur-xl
                   rounded-2xl p-10
                   border border-white/40
                   shadow-[0_0_50px_rgba(56,189,248,0.25)]">

            <!-- Card Glow -->
            <div class="absolute inset-0 rounded-2xl
                        bg-gradient-to-br from-white/20 to-transparent
                        pointer-events-none"></div>

            <ul class="relative space-y-5 text-sm">
                <li class="flex justify-between">
                    <span class="text-slate-600">Role</span>
                    <span class="text-slate-800 font-medium">Web Developer</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-slate-600">Stack</span>
                    <span class="text-slate-800 font-medium">
                        Laravel & Tailwind
                    </span>
                </li>
                <li class="flex justify-between">
                    <span class="text-slate-600">Focus</span>
                    <span class="text-slate-800 font-medium">
                        Elegant UI / UX
                    </span>
                </li>
                <li class="flex justify-between">
                    <span class="text-slate-600">Theme</span>
                    <span class="text-sky-600 font-semibold">
                        Furina Inspired
                    </span>
                </li>
            </ul>
        </div>

    </div>
</section>
