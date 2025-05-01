@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">SuperAdmin Dashboard</h1>
    <p class="text-gray-600 dark:text-gray-300">Welcome, SuperAdmin! You can manage users, courses, departments, and system settings.</p>

    <ul class="mt-4 space-y-2">
        <li><a href="{{ route('superadmin.manage-users') }}" class="text-blue-600 hover:underline">Manage Users</a></li>
        <li><a href="{{ route('superadmin.manage-courses') }}" class="text-blue-600 hover:underline">Manage Courses/Departments/Sections</a></li>
        <li><a href="{{ route('superadmin.academic-periods') }}" class="text-blue-600 hover:underline">Academic Periods & Terms</a></li>
        <li><a href="{{ route('superadmin.manage-grades') }}" class="text-blue-600 hover:underline">Manage Grades</a></li>
        <li><a href="{{ route('superadmin.settings') }}" class="text-blue-600 hover:underline">System Settings</a></li>
    </ul>
</div>
@endsection
