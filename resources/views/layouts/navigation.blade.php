<nav class="bg-gray-800 text-white h-screen w-64">
    <div class="flex items-center justify-center h-16">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-white" />
        </a>
    </div>
    <div class="mt-10">
        <ul>
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')">
                    {{ __('Grades') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('students.create')" :active="request()->routeIs('students.create')">
                    {{ __('Add New Student') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </x-nav-link>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </li>
        </ul>
    </div>
</nav>
