@extends('layouts.app')

@section('title', 'Instructor Sidebar')

@section('content')
<div class="flex min-h-[calc(100vh-48px)]">
  <nav class="bg-[#4da674] w-64 p-6 text-white no-scrollbar overflow-y-auto">
    <div class="font-bold mb-6">Instructor</div>
    <ul class="space-y-4 text-sm font-semibold">
      <li class="flex items-center gap-2 cursor-pointer hover:text-gray-200">
        <i class="fas fa-tachometer-alt"></i>
        <span class="sidebar-text">Dashboard</span>
      </li>
      <li class="flex items-center gap-2 cursor-pointer hover:text-gray-200">
        <i class="fas fa-users"></i>
        <span class="sidebar-text">Manage Students</span>
      </li>
      <li class="flex items-center gap-2 cursor-pointer bg-white text-[#4da674] rounded-md px-3 py-1 font-bold">
        <i class="fas fa-edit"></i>
        <span class="sidebar-text">Input Grades</span>
      </li>
      <li class="flex items-center gap-2 cursor-pointer hover:text-gray-200">
        <i class="fas fa-eye"></i>
        <span class="sidebar-text">View Grades</span>
      </li>
    </ul>
  </nav>
</div>
@endsection
