<nav class="bg-gray-800 text-white h-screen w-64 shadow-lg">
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
        <div class="mt-6">
            <h3 class="text-lg font-semibold">Departments</h3>
            <ul>
                <li>
                    <button class="w-full text-left px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-200">
                        Department Button
                    </button>
                </li>
                @if($departments->isEmpty())
                    <li>
                        <x-nav-link :href="#" class="hover:bg-gray-700 transition duration-200">
                            No departments available
                        </x-nav-link>
                    </li>
                @else
                    @foreach($departments as $department)
                        <li>
                            <x-nav-link :href="route('department.show', $department->department_id)" :active="request()->routeIs('department.show', $department->department_id)" class="hover:bg-gray-700 transition duration-200">
                                {{ $department->department_name }}
                            </x-nav-link>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <pre>{{ print_r($departments, true) }}</pre>
</nav> 