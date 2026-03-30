<!DOCTYPE html>
<html lang="en" class="scroll-smooth theme-dark dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Page Not Found | FNR Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }
        @keyframes spin-slow { 0%{transform:rotate(0deg)} 100%{transform:rotate(360deg)} }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    </style>

    {{-- Dark mode FOUC fix --}}
    <script>
        (function() {
            var t = localStorage.getItem('theme') || 'dark';
            document.documentElement.className = 'scroll-smooth theme-' + t + (t === 'dark' ? ' dark' : '');
        })();
    </script>
</head>
<body class="bg-bg text-text min-h-screen flex items-center justify-center relative overflow-hidden">

    {{-- Ambient orbs --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-primary/8 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-[5%] right-[-5%] w-[400px] h-[400px] bg-primary-2/8 blur-[120px] rounded-full"></div>
    </div>

    {{-- Decorative rotating ring --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full border border-primary/5 animate-spin-slow pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] rounded-full border border-primary/8 animate-spin-slow pointer-events-none" style="animation-direction:reverse;animation-duration:15s;"></div>

    <div class="relative z-10 text-center px-6 max-w-2xl mx-auto">

        {{-- Giant 404 --}}
        <div class="animate-float mb-8">
            <h1 class="font-cinzel text-[clamp(6rem,20vw,14rem)] font-black leading-none bg-gradient-to-br from-text via-primary/50 to-primary-2/30 bg-clip-text text-transparent select-none">
                404
            </h1>
        </div>

        {{-- Divider --}}
        <div class="flex items-center gap-4 justify-center mb-8">
            <span class="h-px w-16 bg-gradient-to-r from-transparent to-primary/50"></span>
            <span class="text-[10px] font-bold text-primary uppercase tracking-[0.4em]">Page Not Found</span>
            <span class="h-px w-16 bg-gradient-to-l from-transparent to-primary/50"></span>
        </div>

        {{-- Message --}}
        <p class="text-muted text-lg leading-relaxed mb-4 font-light">
            The page you're looking for has drifted into the void.
        </p>
        <p class="text-muted/60 text-sm mb-12">
            It might have been moved, deleted, or perhaps it never existed in the first place.
        </p>

        {{-- Action buttons --}}
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="/"
               class="group relative px-8 py-4 bg-primary text-white rounded-2xl overflow-hidden font-bold text-sm tracking-widest uppercase hover:scale-105 transition-all shadow-lg shadow-primary/20">
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Back to Homepage
                </span>
            </a>
            <a href="/#contact"
               class="px-8 py-4 bg-surface/40 backdrop-blur-md border border-border text-text rounded-2xl font-bold text-sm tracking-widest uppercase hover:bg-surface/80 transition-all">
                Contact Me
            </a>
        </div>

        {{-- Subtle branding --}}
        <div class="mt-20 flex items-center justify-center gap-3 opacity-30">
            <span class="h-px w-8 bg-border"></span>
            <span class="font-cinzel text-sm font-bold text-muted">FNR<span class="text-primary">.</span></span>
            <span class="h-px w-8 bg-border"></span>
        </div>
    </div>

</body>
</html>
