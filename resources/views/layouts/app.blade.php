<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Furina Portfolio</title>

    <!-- Font Elegant -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white
             bg-gradient-to-b from-sky-950 via-blue-950 to-black min-h-screen">

    {{-- Navbar Portfolio --}}
    @include('components.navbar')

    {{-- Optional header (dipakai dashboard nanti) --}}
    @isset($header)
        <header class="border-b border-blue-400/20 backdrop-blur-md bg-blue-900/20">
            <div class="max-w-6xl mx-auto py-6 px-6">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="max-w-6xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>