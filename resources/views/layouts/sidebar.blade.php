<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="w-64 bg-[#4DA674] text-white flex flex-col py-4">
    <h2 class="text-lg font-bold px-6 pb-4">Chairperson</h2>

    <nav class="flex-1">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center px-6 py-2 hover:bg-green-800">
                    <i class="lucide lucide-mail mr-2"></i> Invite Instructor
                </a>
            </li>
            <li>
                <a href="{{ route('manage.chairperson') }}" class="flex items-center px-6 py-2 {{ request()->routeIs('manage.instructor') ? 'bg-green-700 rounded-r-full' : 'hover:bg-green-800' }}">
                    <i class="lucide lucide-laptop mr-2"></i> Manage Instructor
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-6 py-2 hover:bg-green-800">
                    <i class="lucide lucide-pencil mr-2"></i> Assign Subjects to Instructors
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-6 py-2 hover:bg-green-800">
                    <i class="lucide lucide-graduation-cap mr-2"></i> View Grades
                </a>
            </li>
        </ul>
    </nav>
</aside>
