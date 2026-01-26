<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FurinaDev Portfolio')</title>
    
    @include('partials.seo')
    
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💧</text></svg>">
    
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-dark-bg text-white overflow-x-hidden">
    {{-- Rain Background --}}
    <x-background-rain />
    
    {{-- Navbar --}}
    <x-navbar-dynamic />
    
    {{-- Main Content --}}
    <main class="relative z-10">
        @yield('content')
    </main>
    
    {{-- Footer --}}
    <x-footer />
    
    {{-- Language Switcher --}}
    <x-language-switcher />
    
    {{-- Additional Scripts --}}
    @stack('scripts')
</body>
</html>