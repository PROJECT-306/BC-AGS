<x-guest-layout>
    <div class="flex flex-col items-center justify-center bg-green-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-center mb-6">Register</h2>

            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-500 text-white rounded">
                        <strong>{{ __('Whoops! Something went wrong.') }}</strong>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- First Name -->
                <div class="mb-4">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="bg-white block mt-1 w-full border border-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- Middle Name -->
                <div class="mb-4">
                    <x-input-label for="middle_name" :value="__('Middle Name')" />
                    <x-text-input id="middle_name" class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <!-- User Role -->
                <div class="mb-4">
                    <x-input-label for="user_role_id" :value="__('User Role')" />
                    <select name="user_role_id" id="user_role_id" required class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        <option value="" disabled selected>Select A Role</option>
                        @foreach (App\Models\UserRole::all() as $role)
                            <option value="{{ $role->user_role_id }}">{{ $role->user_role_number }} - {{ $role->user_role_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="bg-white block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit and Link -->
                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

<<<<<<< HEAD
        <!--Middle Name -->
        <div>
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!--Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!--User Role-->
        <div>
            <x-input-label for="user_role_id" :value="__('User Role')" />
            <select name="user_role_id" id="user_role_id" required>
                <option value="" disabled selected>Select A Role</option>

                @foreach (App\Models\UserRole::all() as $role)
                    <option value="{{$role->user_role_id}}">{{$role->user_role_number}} - {{$role->user_role_name}}</option>
                @endforeach

            </select>
        </div>

        <!-- Department Dropdown -->
        <div id="department-container" style="display: none;">
            <x-input-label for="department_id" :value="__('Department')" />
            <select name="department_id" id="department_id">
                <option value="" disabled selected>Select A Department</option>

                @foreach (App\Models\Department::all() as $dept)
                    <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
            @endforeach

            </select>
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('user_role_id');
            const departmentContainer = document.getElementById('department-container');
    
            function toggleDepartmentDropdown() {
                const selectedRole = parseInt(roleSelect.value);
                if (selectedRole === 3 || selectedRole === 4) {
                    departmentContainer.style.display = 'block';
                } else {
                    departmentContainer.style.display = 'none';
                }
            }
    
            // Trigger on load and change
            roleSelect.addEventListener('change', toggleDepartmentDropdown);
            toggleDepartmentDropdown(); // in case of old value on page load
        });
    </script>
    
=======
    <!-- Font Awesome (optional if icons used) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
>>>>>>> origin/kyle-policies
</x-guest-layout>
