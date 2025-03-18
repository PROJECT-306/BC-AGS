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

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center min-h-screen">
        <header class="w-full max-w-4xl text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Welcome to Our Application</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Your journey starts here. Let's get started!</p>
        </header>

        <nav class="flex items-center justify-center gap-6">
            @auth
                <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Register</a>
                @endif
            @endauth
        </nav>
    </body>
</html>
