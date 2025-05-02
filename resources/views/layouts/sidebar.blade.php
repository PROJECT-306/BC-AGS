@php
    $user = Auth::user();
    $roleNumber = $user->userRole?->user_role_number;
    
    $role = match($roleNumber) {
        'ROLE-001' => 'SuperAdmin',
        'ROLE-002' => 'Admin',
        'ROLE-003' => 'Instructor',
        'ROLE-004' => 'Chairperson',
        'ROLE-005' => 'Dean',
        default => 'Unknown',
    };
@endphp

<div class="h-full w-full flex flex-col">
    <div class="p-6 font-bold text-xl text-gray-700 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700">
        {{ $role }} Panel
    </div>

    <nav class="mt-4 space-y-2 px-4 text-sm flex-1">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">
            Dashboard
        </a>

        {{-- SuperAdmin --}}
        @if ($role === 'SuperAdmin')
            <a href="{{ route('superadmin.manage-users') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Users
            </a>
            <a href="{{ route('superadmin.manage-courses') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Courses/Depts/Sections
            </a>
            <a href="{{ route('superadmin.academic-periods') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Academic Period & Term
            </a>
            <a href="{{ route('superadmin.manage-grades') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Grades
            </a>
            <a href="{{ route('superadmin.settings') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Settings
            </a>

        {{-- Instructor --}}
        @elseif ($role === 'Instructor')
            <a href="{{ route('instructor.manage-students') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Students
            </a>
            <a href="{{ route('instructor.manage-grades') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Grades
            </a>
            <a href="{{ route('instructor.view-grades') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                View Grades
            </a>
            <a href="{{ route('instructor.reports') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Reports & Analytics
            </a>

        {{-- Chairperson --}}
        @elseif ($role === 'Chairperson')
            <a href="{{ route('chairperson.manage-instructor') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Manage Instructors
            </a>
            <a href="{{ route('chairperson.assign-subjects') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Assign Subjects
            </a>
            <a href="{{ route('chairperson.view-grades') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                View Grades
            </a>
            <a href="{{ route('chairperson.reports') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Reports & Analytics
            </a>

        {{-- Dean --}}
        @elseif ($role === 'Dean')
            <a href="{{ route('dean.view-grades') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                View Grades
            </a>
            <a href="{{ route('dean.reports') }}" class="block px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                Reports & Analytics
            </a>
        @endif
    </nav>
</div>
