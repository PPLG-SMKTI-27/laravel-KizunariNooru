<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth theme-dark dark">
<head>
    <meta charset="utf-8">
    {{-- Dark Mode FOUC Fix: runs before CSS renders to prevent white-flash --}}
    <script>
        (function(){
            var t = localStorage.getItem('theme') || 'dark';
            document.documentElement.className = 'scroll-smooth theme-' + t + (t === 'dark' ? ' dark' : '');
        })();
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Search Engine Optimization --}}
    <meta name="description" content="{{ $settings['hero_bio'] ?? 'Fahri Noor Royyan — Laravel Web Developer Portfolio. Elegant Furina-inspired aesthetics from Fontaine.' }}">
    <meta name="keywords" content="Fahri Noor Royyan, Laravel Developer, Web Developer, Portfolio, Fontaine Theme, UI/UX, Full-Stack">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Fahri Noor Royyan' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['hero_name'] ?? 'Fahri' }} | Professional Portfolio">
    <meta property="og:description" content="{{ $settings['hero_bio'] ?? 'Membangun jembatan antara imajinasi dan realitas digital.' }}">
    <meta property="og:image" content="{{ url('/photo-profile.jpeg') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $settings['hero_name'] ?? 'Fahri' }} | Professional Portfolio">
    <meta property="twitter:description" content="{{ $settings['hero_bio'] ?? 'Membangun jembatan antara imajinasi dan realitas digital.' }}">
    <meta property="twitter:image" content="{{ url('/photo-profile.jpeg') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <title>{{ $settings['hero_name'] ?? 'Fahri' }} | @yield('title', 'Portfolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Cloudflare Turnstile (Anti-Spam) - loaded only when keys are configured --}}
    @if(config('services.turnstile.site_key') && config('services.turnstile.site_key') !== 'YOUR_TURNSTILE_SITE_KEY')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endif

    {{-- Google Analytics GA4 (only on production) --}}
    @if(app()->isProduction() && config('services.google_analytics.id') && config('services.google_analytics.id') !== 'G-XXXXXXXXXX')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.id') }}', { 'send_page_view': false });
        window._gaId = '{{ config('services.google_analytics.id') }}';
    </script>
    @endif

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Swup SPA Transitions */
        .transition-fade { transition: 0.5s; opacity: 1; }
        html.is-animating .transition-fade { opacity: 0; transform: translateY(20px); }
    </style>

    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Cloudflare Web Analytics (privacy-friendly, no cookies, no GDPR banner needed) --}}
    @if(config('services.cloudflare_analytics.token') && config('services.cloudflare_analytics.token') !== 'YOUR_CF_TOKEN')
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
            data-cf-beacon='{"token": "{{ config('services.cloudflare_analytics.token') }}"}'>
    </script>
    @endif
</head>
<body class="{{ !request()->routeIs('dashboard*') ? 'bg-bg text-text min-h-screen flex flex-col' : 'bg-[#050f2e] text-white min-h-screen' }}">
    {{-- Global Cinematic Noise Overlay --}}
    @if(!request()->routeIs('dashboard*'))
    <svg id="global-noise" class="hidden">
        <filter id="cinematic-noise">
            <feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/>
        </filter>
    </svg>
    <div class="fixed inset-0 pointer-events-none z-[9998] opacity-[0.03] mix-blend-overlay" style="filter: url(#cinematic-noise);"></div>
    @endif

    <div class="{{ !request()->routeIs('dashboard*') ? 'flex-grow flex flex-col' : '' }}">

    @if(!request()->routeIs('dashboard*'))
        <x-loaders.crt-preloader />
    @endif

    {{-- Custom cursor removed --}}

    {{-- <div class="orb" style="width:600px;height:600px;background:rgba(6,182,212,0.06);top:-15%;right:-10%;z-index:-1;"></div>
    <div class="orb" style="width:500px;height:500px;background:rgba(8,145,178,0.04);bottom:5%;left:-10%;z-index:-1;"></div>
    <div id="tsparticles" style="position:fixed;inset:0;z-index:-2;pointer-events:none;"></div> --}}

    <div class="relative min-h-screen">
        @if(!request()->routeIs('dashboard*'))
            @include('components.navbar')
        @endif

        {{-- Dynamic Alpine.js Toast Notifications --}}
        <div id="toast-container" class="fixed top-24 right-6 z-[100] max-w-[320px] w-full px-4 flex flex-col gap-4 pointer-events-none"
             x-data="{ 
                 toasts: [],
                 addToast(type, message) {
                     let id = Date.now();
                     this.toasts.push({ id, type, message, show: false, progress: 100 });
                     
                     // Animate in
                     setTimeout(() => {
                         let t = this.toasts.find(t => t.id === id);
                         if(t) t.show = true;
                     }, 50);

                     // Progress timer
                     let timer = setInterval(() => {
                         let t = this.toasts.find(t => t.id === id);
                         if (!t) {
                             clearInterval(timer);
                             return;
                         }
                         t.progress -= 1; // 5000ms total
                         if (t.progress <= 0) {
                             clearInterval(timer);
                             this.removeToast(id);
                         }
                     }, 50);
                 },
                 removeToast(id) {
                     let t = this.toasts.find(t => t.id === id);
                     if(t) t.show = false;
                     // Wait for leave animation
                     setTimeout(() => {
                         this.toasts = this.toasts.filter(toast => toast.id !== id);
                     }, 500);
                 }
             }"
             @notify.window="addToast($event.detail.type, $event.detail.message)"
             x-init="
                @if(session('success')) addToast('success', {{ \Illuminate\Support\Js::from(session('success')) }}); @endif
                @if(session('error')) addToast('error', {{ \Illuminate\Support\Js::from(session('error')) }}); @endif
                @if($errors->any()) addToast('error', {{ \Illuminate\Support\Js::from($errors->first()) }}); @endif
             ">
             <template x-for="toast in toasts" :key="toast.id">
                 <div class="relative group overflow-hidden rounded-[2rem] bg-surface/40 backdrop-blur-3xl border shadow-lg p-5 flex items-center gap-4 transition-all duration-500 transform pointer-events-auto"
                      :class="[
                          toast.type === 'success' ? 'border-success/20 shadow-[0_20px_40px_rgba(var(--color-success-rgb),0.1)]' : 'border-error/20 shadow-[0_20px_40px_rgba(var(--color-error-rgb),0.1)]',
                          toast.show ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0'
                      ]">
                     <!-- Glow -->
                     <div class="absolute -right-10 -top-10 w-32 h-32 blur-[40px] rounded-full"
                          :class="toast.type === 'success' ? 'bg-success/10' : 'bg-error/10'"></div>

                     <!-- Icon -->
                     <div class="shrink-0 w-12 h-12 rounded-2xl border flex items-center justify-center shadow-inner"
                          :class="toast.type === 'success' ? 'bg-success/10 border-success/20 text-success' : 'bg-error/10 border-error/20 text-error'">
                         <svg class="w-6 h-6" :class="toast.type === 'success' ? 'drop-shadow-[0_0_8px_rgba(var(--color-success-rgb),0.5)]' : 'drop-shadow-[0_0_8px_rgba(var(--color-error-rgb),0.5)]'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path x-show="toast.type === 'success'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                             <path x-show="toast.type !== 'success'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                         </svg>
                     </div>

                     <!-- Text -->
                     <div class="flex-1">
                         <h4 class="text-[10px] font-black uppercase tracking-[0.3em] opacity-80"
                             :class="toast.type === 'success' ? 'text-text' : 'text-error'" x-text="toast.type === 'success' ? 'System.Success' : 'System.Exception'"></h4>
                         <p class="text-xs font-medium text-text/90 mt-1 leading-relaxed" x-text="toast.message"></p>
                     </div>

                     <!-- Close -->
                     <button @click="removeToast(toast.id)" class="transition-colors p-1"
                             :class="toast.type === 'success' ? 'text-text/20 hover:text-primary' : 'text-error/20 hover:text-error'">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                     </button>

                     <!-- Progress Bar -->
                     <div class="absolute bottom-0 left-0 h-[3px] transition-all duration-100 ease-linear"
                          :class="toast.type === 'success' ? 'bg-gradient-to-r from-success/50 to-success' : 'bg-gradient-to-r from-error/50 to-error'"
                          :style="'width: ' + toast.progress + '%'"></div>
                 </div>
             </template>
        </div>

        <main id="swup" class="transition-fade">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        @if(!request()->routeIs('dashboard*'))
            @include('components.footer')
        @endif

        <button id="back-to-top" aria-label="Scroll back to top"
                class="fixed bottom-10 right-10 w-14 h-14 rounded-[1.5rem] bg-surface/20 border border-white/10 backdrop-blur-2xl text-primary flex items-center justify-center opacity-0 pointer-events-none transition-all duration-700 z-[100] group overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.2)]">

            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 via-transparent to-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

            <div class="absolute inset-0 translate-y-full group-hover:translate-y-0 bg-primary transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)]"></div>

            <div class="relative z-10 flex flex-col items-center">
                <svg class="w-6 h-6 transform group-hover:-translate-y-1 group-hover:text-surface transition-all duration-500 ease-out"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M5 15l7-7 7 7"/>
                </svg>
                <div class="w-1 h-1 rounded-full bg-surface mt-1 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            <div class="absolute inset-0 rounded-[1.5rem] shadow-[0_0_30px_rgba(var(--color-primary-rgb),0.3)] opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
        </button>
    </div>

    {{-- Main logic is now in resources/js/app.js --}}

    <x-loaders.lang-loader />
    <x-loaders.dash-loader />
</body>
</html>
