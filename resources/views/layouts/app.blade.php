<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portfolio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-sky-950 via-blue-900 to-indigo-950 text-white overflow-x-hidden">

    <x-background-rain />

    <x-navbar />

    <main class="relative z-10">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
