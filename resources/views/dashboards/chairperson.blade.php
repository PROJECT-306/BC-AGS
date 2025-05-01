@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#C1E6BA]">
    <main class="flex-1 p-6">

        {{-- Dashboard Overview Title --}}
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-900 mb-6">Dashboard Overview</h2>

        {{-- Grid of Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            {{-- Total Students --}}
            <div class="bg-[#EAF8E7] shadow rounded-2xl p-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-800">Total Students</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">250</p>
            </div>

            {{-- Total Instructors --}}
            <div class="bg-[#EAF8E7] shadow rounded-2xl p-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-800">Total Instructors</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">25</p>
            </div>

            {{-- Total Courses --}}
            <div class="bg-[#EAF8E7] shadow rounded-2xl p-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-800">Total Courses</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">40</p>
            </div>

            {{-- Subjects Assigned --}}
            <div class="bg-[#EAF8E7] shadow rounded-2xl p-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-800">Subjects Assigned</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">112</p>
            </div>

        </div>
    </main>
</div>
@endsection
