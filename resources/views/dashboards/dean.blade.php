@extends('layouts.app')

@section('title', 'Dean Dashboard')

@section('content')
    <h2 class="font-bold text-[#023336] mb-6 text-sm">Dashboard</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center gap-6 cursor-pointer hover:shadow-lg transition-shadow">
            <div class="bg-[#4da674] rounded-md p-4 text-white">
                <i class="fas fa-user-graduate text-4xl"></i>
            </div>
            <div>
                <div class="text-[#4da674] text-4xl font-bold">500</div>
                <div class="text-[#023336] font-semibold text-lg">Total Students</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 flex items-center gap-6 cursor-pointer hover:shadow-lg transition-shadow">
            <div class="bg-[#4da674] rounded-md p-4 text-white">
                <i class="fas fa-chalkboard-teacher text-4xl"></i>
            </div>
            <div>
                <div class="text-[#4da674] text-4xl font-bold">20</div>
                <div class="text-[#023336] font-semibold text-lg">Total Instructors</div>
            </div>
        </div>
    </div>
@endsection
