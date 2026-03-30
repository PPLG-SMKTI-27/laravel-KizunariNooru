<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .auth-label {
            @apply block text-[10px] uppercase tracking-widest text-[#93c5fd] font-bold mb-2;
        }
        .auth-input {
            @apply w-full bg-[#0a1a48] border border-[#22d3ee]/20 text-white text-sm rounded-xl focus:border-[#22d3ee]/50 focus:ring-1 focus:ring-[#22d3ee]/50 placeholder-[#93c5fd]/30 transition-all outline-none py-3;
        }
        .auth-error {
            @apply mt-2 text-[10px] text-red-400 capitalize;
        }
        .auth-btn {
            @apply w-full py-3.5 rounded-xl bg-gradient-to-r from-[#22d3ee] to-[#2563eb] text-white font-bold tracking-widest uppercase text-xs hover:shadow-[0_0_20px_rgba(34,211,238,0.4)] transition-all duration-300;
        }
        .auth-link {
            @apply text-[#93c5fd]/60 hover:text-[#22d3ee] transition-colors decoration-[#22d3ee]/30 underline underline-offset-4;
        }
    </style>
</head>
<body class="font-sans text-white antialiased bg-[#050f2e] min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="absolute inset-0 z-0 pointer-events-none opacity-40">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/10 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 blur-[150px] rounded-full"></div>
    </div>

    <div class="w-full sm:max-w-md px-6 py-8 bg-[#0a1a48]/50 backdrop-blur-xl border border-cyan-400/10 shadow-2xl overflow-hidden sm:rounded-[2rem] relative z-10">
        {{ $slot }}
    </div>
</body>
</html>
