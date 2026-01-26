<section id="home" class="min-h-screen flex items-center">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

        <!-- LEFT -->
        <div class="reveal">
            <h1 class="text-5xl md:text-6xl font-semibold text-sky-300">
                <x-typing-text />
            </h1>

            <p class="mt-6 text-white/80">
                Web Developer • Laravel • UI Designer
            </p>

            <div class="mt-8">
                <x-social-links />
            </div>
        </div>

        <!-- RIGHT -->
        <div class="reveal relative flex justify-center">
            <div class="absolute w-72 h-72 bg-sky-400/20 blur-3xl rounded-full"></div>
            <img src="{{ asset('img/Furina1.jpg') }}"
                 class="relative w-72 h-72 rounded-full object-cover
                        border border-white/30 animate-float">
        </div>

    </div>
</section>
