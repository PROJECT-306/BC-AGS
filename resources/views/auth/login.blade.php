<x-guest-layout>
    <div class="flex flex-col items-center justify-center bg-green-100">

        <!-- Login Container -->
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">

            <!-- Login Heading -->
            <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username or Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Username or Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="email" name="email" type="text" :value="old('email')" required autofocus autocomplete="username"
                            class="pl-10 block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="pl-10 block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Show Password -->
                <div class="mb-4">
                    <label class="inline-flex items-center text-sm text-gray-600">
                        <input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'" class="mr-2">
                        Show Password
                    </label>
                </div>

                <!-- Login and Register Buttons -->
                <div class="flex justify-between space-x-2 mb-4">
                    <button type="submit" class="w-1/2 px-4 py-2 text-white bg-green-700 hover:bg-green-800 rounded">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="w-1/2 text-center px-4 py-2 text-white bg-green-700 hover:bg-green-800 rounded">
                        Register
                    </a>
                </div>

                <!-- Forgot Password -->
                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                            Forgot Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</x-guest-layout>
