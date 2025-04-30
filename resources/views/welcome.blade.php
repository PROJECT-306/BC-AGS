<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACADEX - Automated Grading System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen text-white">
    <!-- Background image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/bg.jpg'); opacity: 0.60 q    ;"></div>

    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen">
        <div class="text-center p-8 bg-white bg-opacity-10 rounded-lg max-w-lg w-full backdrop-blur-sm">
            <h1 class="text-4xl font-bold mb-4">Welcome to ACADEX</h1>
            <p class="text-lg mb-6">Automated Grading System</p>

            @auth
                <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Go to Dashboard
                </a>
            @else
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="bg-green-600 text-black px-6 py-2 rounded hover:bg-blue-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-gray-300 text-gray-900 px-6 py-2 rounded hover:bg-gray-400 transition">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</body>
</html>
