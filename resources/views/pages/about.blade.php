@vite('resources/css/app.css')

<section id="about" class="relative container mx-auto px-6 py-32 bg-blue-200">

    <!-- Decorative Glow -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-600/20 rounded-full blur-3xl"></div>
    <div class="absolute top-40 -right-20 w-72 h-72 bg-indigo-600/20 rounded-full blur-3xl"></div>

    <div class="relative grid md:grid-cols-2 gap-16 items-center">

        <!-- TEXT -->
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
                Saya mengembangkan website menggunakan Laravel
                dengan pendekatan clean code, UI profesional,
                dan pengalaman pengguna yang premium.
            </p>
        </div>

        <!-- INFO CARD -->
        <div class="bg-slate-800/70 backdrop-blur rounded-xl p-8 border border-slate-700">
            <ul class="space-y-4 text-sm">
                <li class="flex justify-between">
                    <span class="text-gray-400">Role</span>
                    <span class="text-gray-200">Web Developer</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Stack</span>
                    <span class="text-gray-200">Laravel & Tailwind</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Focus</span>
                    <span class="text-gray-200">Elegant UI / UX</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-400">Theme</span>
                    <span class="text-yellow-300">Furina Inspired</span>
                </li>
            </ul>
        </div>

    </div>
</section>
