<aside class="w-64 h-screen fixed top-0 left-0 bg-green-900 text-white flex flex-col py-4 shadow-lg z-10">
    <h2 class="text-lg font-bold px-6 pb-4">Chairperson</h2>

    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2">

            <li>
                <a href="{{ route('manage.chairperson') }}" 
                   class="flex items-center px-6 py-2 {{ request()->routeIs('manage.chairperson') ? 'bg-green-700 rounded-r-full' : 'hover:bg-green-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Manage Instructor
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center px-6 py-2 hover:bg-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Assign Subjects to Instructors
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center px-6 py-2 hover:bg-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                              clip-rule="evenodd" />
                    </svg>
                    View Grades
                </a>
            </li>

        </ul>
    </nav>
</aside>
