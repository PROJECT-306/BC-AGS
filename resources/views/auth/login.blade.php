<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-lg mt-6 px-8 py-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Log in to your account</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
