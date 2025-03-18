<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Create an account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="firstname" :value="__('First Name')" />
                    <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" required autofocus />
                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="middlename" :value="__('Middle Name')" />
                    <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" />
                    <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="surname" :value="__('Surname')" />
                    <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" required />
                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="role" :value="__('Role')" />
                    <select id="role" name="role" class="block mt-1 w-full" required>
                        <option value="instructor">Instructor</option>
                        <option value="chairperson">Chairperson</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Super Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
