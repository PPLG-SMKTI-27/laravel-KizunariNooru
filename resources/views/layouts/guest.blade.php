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
