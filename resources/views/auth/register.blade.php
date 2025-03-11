<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="firstname" :value="__('First Name')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="mt-4">
            <x-input-label for="middlename" :value="__('Middle Name')" />
            <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Surname')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full" required onchange="toggleDepartment()">
                <option value="" disabled {{ old('role') === null ? 'selected' : '' }}>Select a Role</option>
                <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Instructor</option>
                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Chairperson</option>
                <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Dean</option>
                <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>Admin</option>
                <option value="4" {{ old('role') == 4 ? 'selected' : '' }}>Super Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Department Selection (Visible only for roles 0, 1, 2) -->
        <div id="department-section" class="mt-4" style="display: none;">
            <x-input-label for="department_id" :value="__('Department')" />
            <select id="department_id" name="department_id" class="block mt-1 w-full">
                <option value="" disabled selected>Select a Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->department_id }}" {{ old('department_id') == $department->department_id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleDepartment() {
            var role = document.getElementById('role').value;
            var departmentSection = document.getElementById('department-section');

            // Show department only for roles 0 (Instructor), 1 (Chairperson), and 2 (Dean)
            if (role === "0" || role === "1" || role === "2") {
                departmentSection.style.display = 'block';
            } else {
                departmentSection.style.display = 'none';
            }
        }

        // Ensure correct visibility on page load
        document.addEventListener("DOMContentLoaded", function() {
            toggleDepartment();
        });
    </script>
</x-guest-layout>
