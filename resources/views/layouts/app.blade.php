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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 h-screen">
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
</body>
</html>
 