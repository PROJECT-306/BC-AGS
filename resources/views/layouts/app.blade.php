<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
<<<<<<< HEAD
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-[#C1E6BA] dark:bg-gray-900 h-screen">
    <div class="flex h-screen">
        <!-- Sidebar full height -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg flex flex-col">
            @include('layouts.sidebar')
        </aside>

        <!-- Main content area: top nav + page content -->
        <div class="flex flex-col flex-1 min-h-screen">
            <!-- Top Navigation -->
            <div class="shrink-0">
                @include('layouts.navigation')
            </div>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @isset($header)
                    <div class="bg-white dark:bg-gray-800 shadow mb-4 p-4 rounded">
                        {{ $header }}
                    </div>
                @endisset

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
=======
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

>>>>>>> origin/kyle-policies
</body>
</html>
 