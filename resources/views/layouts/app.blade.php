<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        label {
            @apply text-gray-800 font-medium;
        }

        h3 {
            @apply text-gray-800;
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#C1E6BA]">

    <!-- Fixed Top Navigation -->
    <div class="fixed top-0 left-0 w-full z-50">
        @include('layouts.navigation')
    </div>

    <!-- Fixed Sidebar -->
    <div class="fixed top-16 left-0 w-64 h-[calc(100vh-4rem)] z-40 bg-white shadow">
        @include('layouts.sidebar')
    </div>

    <!-- Main Content Area -->
    <div class="ml-64 pt-16 min-h-screen p-6">
        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-[#C1E6BA] p-4 mb-4 rounded-lg shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Alpine JS (for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>
