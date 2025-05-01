@extends('layouts.app')

@section('content')
    <main class="flex-1 p-6 overflow-auto">
      <h2 class="font-bold text-[#023336] mb-4 text-sm">ASBME Department</h2>

      <!-- Subjects Container -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
          <i class="fas fa-book text-[#4da674] text-3xl flex-shrink-0"></i>
          <div>
            <div class="font-semibold text-[#023336]">IT306</div>
            <div class="text-[#4da674] text-xs leading-tight max-w-xs">
              Advanced Database Management Systems
            </div>
          </div>
        </div>
        <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
          <i class="fas fa-book text-[#4da674] text-3xl flex-shrink-0"></i>
          <div>
            <div class="font-semibold text-[#023336]">IT307</div>
            <div class="text-[#4da674] text-xs leading-tight max-w-xs">
              Web Application Development
            </div>
          </div>
        </div>
        <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
          <i class="fas fa-book text-[#4da674] text-3xl flex-shrink-0"></i>
          <div>
            <div class="font-semibold text-[#023336]">IT308</div>
            <div class="text-[#4da674] text-xs leading-tight max-w-xs">
              Network Security and Management
            </div>
          </div>
        </div>
        <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
          <i class="fas fa-book text-[#4da674] text-3xl flex-shrink-0"></i>
          <div>
            <div class="font-semibold text-[#023336]">IT309</div>
            <div class="text-[#4da674] text-xs leading-tight max-w-xs">
              Software Engineering Principles
            </div>
          </div>
        </div>
      </div>

      <!-- Sections Container -->
      <div class="mt-6">
        <h3 class="font-bold text-[#023336] mb-4 text-sm">Sections</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
            <i class="fas fa-sun text-[#4da674] text-3xl flex-shrink-0"></i>
            <div>
              <div class="font-semibold text-[#023336]">Morning Class</div>
            </div>
          </div>
          <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
            <i class="fas fa-cloud-sun text-[#4da674] text-3xl flex-shrink-0"></i>
            <div>
              <div class="font-semibold text-[#023336]">Afternoon Class</div>
            </div>
          </div>
          <div class="bg-white rounded-md p-5 flex items-center gap-4 cursor-pointer">
            <i class="fas fa-moon text-[#4da674] text-3xl flex-shrink-0"></i>
            <div>
              <div class="font-semibold text-[#023336]">Evening Class</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Assessments Container -->
      <div class="mt-6">
        <nav class="mb-4 text-sm text-[#4da674] font-semibold flex gap-4">
          <button class="assessment-breadcrumb px-3 py-1 rounded-md bg-[#4da674] text-white" data-assessment="Prelim">Prelim</button>
          <button class="assessment-breadcrumb px-3 py-1 rounded-md hover:bg-[#4da674] hover:text-white" data-assessment="Midterm">Midterm</button>
          <button class="assessment-breadcrumb px-3 py-1 rounded-md hover:bg-[#4da674] hover:text-white" data-assessment="Prefinal">Prefinal</button>
          <button class="assessment-breadcrumb px-3 py-1 rounded-md hover:bg-[#4da674] hover:text-white" data-assessment="Final">Final</button>
        </nav>
        <button class="mb-4 bg-[#4da674] text-white px-4 py-2 rounded-md font-semibold hover:bg-green-700 transition">
          Add Assessment
        </button>

        <!-- Students Table -->
        <div class="overflow-x-auto bg-white rounded-md p-4">
          <table class="min-w-full border-collapse border border-gray-300">
            <thead>
              <tr class="bg-[#4da674] text-white text-left">
                <th class="border border-gray-300 px-3 py-2">Name</th>
                <th class="border border-gray-300 px-3 py-2">Quiz</th>
                <th class="border border-gray-300 px-3 py-2">OCR</th>
                <th class="border border-gray-300 px-3 py-2">Exam</th>
                <th class="border border-gray-300 px-3 py-2">Average</th>
              </tr>
            </thead>
            <tbody>
              <tr class="even:bg-gray-50">
                <td class="border border-gray-300 px-3 py-2">Juan Dela Cruz</td>
                <td class="border border-gray-300 px-3 py-2"><input type="number" min="0" max="100" class="w-full border border-gray-300 rounded px-2 py-1" /></td>
                <td class="border border-gray-300 px-3 py-2"><input type="number" min="0" max="100" class="w-full border border-gray-300 rounded px-2 py-1" /></td>
                <td class="border border-gray-300 px-3 py-2"><input type="number" min="0" max="100" class="w-full border border-gray-300 rounded px-2 py-1" /></td>
                <td class="border border-gray-300 px-3 py-2">0</td>
              </tr>
              <!-- More rows can be added here -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
