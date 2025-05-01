@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
    <h2 class="font-bold text-[#023336] mb-6 text-sm">Dashboard</h2>

    <div id="cardsContainer" class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-6xl">
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center gap-4">
            <i class="fas fa-book-open text-[#4da674] text-5xl"></i>
            <div class="text-[#4da674] text-4xl font-bold">5</div>
            <div class="font-semibold text-[#023336] text-center">Total Number of Subjects Handled</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center gap-4">
            <i class="fas fa-user-graduate text-[#4da674] text-5xl"></i>
            <div class="text-[#4da674] text-4xl font-bold">60</div>
            <div class="font-semibold text-[#023336] text-center">Total Students</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center gap-4">
            <i class="fas fa-check-circle text-[#4da674] text-5xl"></i>
            <div class="text-[#4da674] text-4xl font-bold">Submitted</div>
            <div class="font-semibold text-[#023336] text-center">Grade Status</div>
        </div>
    </div>
@endsection

