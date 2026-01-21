<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Furina Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-900 text-gray-200 font-inter">

    <x-navbar/>

    <main>
        @yield('content')
    </main>

    <x-footer/>
</body>
</html>
