<nav x-data="{ open: false, viewOpen: false, mobileOpen: false }" class="bg-[#023336] shadow">
    <div class="w-full mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Mobile Menu Button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="mobileOpen = !mobileOpen" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Logo + Links -->
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-white">
                        ACADEX
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:ml-40">
                    <div class="flex space-x-4">
                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}" 
                           class="text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-[#023336] text-white' : '' }}">
                            Home
                        </a>

                        <!-- View Dropdown (Click to open) -->
                        <div class="relative">
                            <button @click="viewOpen = !viewOpen"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white hover:bg-green-800 hover:text-white rounded-md focus:outline-none transition">
                                View
                                <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <div x-show="viewOpen" @click.outside="viewOpen = false"
                                class="absolute z-50 mt-2 w-64 bg-white dark:bg-green-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-md py-1 transition"
                                x-transition>
                                <x-dropdown-link href="{{ route('assessment-types.index') }}">Assessment Type</x-dropdown-link>
                                <x-dropdown-link href="{{ route('class-works.index') }}">Class Work</x-dropdown-link>
                                <x-dropdown-link href="{{ route('courses.index') }}">Course</x-dropdown-link>
                                <x-dropdown-link href="{{ route('departments.index') }}">Department</x-dropdown-link>
                                <x-dropdown-link href="{{ route('final-grades.index') }}">Final Grade (WIP)</x-dropdown-link>
                                <x-dropdown-link href="{{ route('grading-periods.index') }}">Grading Period</x-dropdown-link>
                                <x-dropdown-link href="{{ route('semesters.index') }}">Semester</x-dropdown-link>
                                <x-dropdown-link href="{{ route('students.index') }}">Student</x-dropdown-link>
                                <x-dropdown-link href="{{ route('student-class-records.index') }}">Student Class Record (WIP)</x-dropdown-link>
                                <x-dropdown-link href="{{ route('student-class-works.index') }}">Student Class Works (WIP)</x-dropdown-link>
                                <x-dropdown-link href="{{ route('student-subjects.index') }}">Student Subjects (WIP)</x-dropdown-link>
                                <x-dropdown-link href="{{ route('subjects.index') }}">Subject</x-dropdown-link>
                                <x-dropdown-link href="{{ route('users.index') }}">User (WIP)</x-dropdown-link>
                                <x-dropdown-link href="{{ route('user-roles.index') }}">User Roles</x-dropdown-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="ml-auto flex items-center space-x-4">
                @auth
                    <div class="relative">
                        <button @click="open = !open"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white hover:bg-green-800 hover:text-white rounded-md focus:outline-none transition">
                            {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                            <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                        </button>

                        <div x-show="open" @click.outside="open = false"
                            class="absolute right-0 z-50 mt-2 w-48 bg-white dark:bg-green-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-md py-1 transition"
                            x-transition>
                            <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                                Role: {{ auth()->user()->user_role->user_role_name }}
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Register
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileOpen" class="sm:hidden mt-2 space-y-1" x-transition>
            <a href="{{ route('dashboard') }}" 
               class="block text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                Home
            </a>

            <div>
                <button @click="viewOpen = !viewOpen" class="w-full text-left text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                    View
                </button>
                <div x-show="viewOpen" class="pl-4 space-y-1" x-transition>
                    <x-dropdown-link href="{{ route('assessment-types.index') }}">Assessment Type</x-dropdown-link>
                    <x-dropdown-link href="{{ route('class-works.index') }}">Class Work</x-dropdown-link>
                    <x-dropdown-link href="{{ route('courses.index') }}">Course</x-dropdown-link>
                    <!-- Add more if you want -->
                </div>
            </div>

            @auth
                <a href="{{ route('profile.edit') }}" class="block text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" 
                   class="block text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                   class="block text-white hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>
