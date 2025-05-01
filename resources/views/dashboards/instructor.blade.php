@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Instructor Dashboard</h1>
    <p class="text-gray-600 dark:text-gray-300">Manage your classes, students, and submit grades.</p>

    <ul class="mt-4 space-y-2">
        <li><a href="{{ route('instructor.manage-students') }}" class="text-blue-600 hover:underline">Manage Students</a></li>
        <li><a href="{{ route('instructor.manage-grades') }}" class="text-blue-600 hover:underline">Manage Grades</a></li>
        <li><a href="{{ route('instructor.view-grades') }}" class="text-blue-600 hover:underline">View Grades</a></li>
        <li><a href="{{ route('instructor.reports') }}" class="text-blue-600 hover:underline">Reports & Analytics</a></li>
    </ul>
</div>
@endsection
