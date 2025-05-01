@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Chairperson Dashboard</h1>
    <p class="text-gray-600 dark:text-gray-300">Oversee instructors and course assignments.</p>

    <ul class="mt-4 space-y-2">
        <li><a href="{{ route('chairperson.manage-instructor') }}" class="text-blue-600 hover:underline">Manage Instructors</a></li>
        <li><a href="{{ route('chairperson.assign-subjects') }}" class="text-blue-600 hover:underline">Assign Subjects</a></li>
        <li><a href="{{ route('chairperson.view-grades') }}" class="text-blue-600 hover:underline">View Grades</a></li>
        <li><a href="{{ route('chairperson.reports') }}" class="text-blue-600 hover:underline">Reports & Analytics</a></li>
    </ul>
</div>
@endsection
