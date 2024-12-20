<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TKI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="mb-4 text-4xl font-bold text-gray-800">Selamat Datang di TKI</h1>
        <p class="mb-6 text-gray-600">Platform terbaik untuk kebutuhan Anda.</p>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-6 py-2 text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 text-white transition duration-300 bg-green-600 rounded-lg shadow-md hover:bg-green-700">
                        Log in
                    </a>
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
