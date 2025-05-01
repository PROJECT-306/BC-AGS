@extends('layouts.app')

@section('title', 'Manage Students - Instructor Dashboard')

@section('content')

    <!-- Main Content Section -->
    <main class="flex-1 p-4 sm:p-6 md:p-8 overflow-auto">
      <section class="bg-white rounded shadow-lg p-6 space-y-6">
        <h3 class="font-bold text-base mb-4">Manage Students</h3>

        <!-- File Upload Section -->
        <form class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">
          <label for="file-upload" class="block text-gray-700 font-semibold text-base">
            Upload Student Enrollment File:
          </label>
          <input type="file" id="file-upload" name="file-upload" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
          <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition font-semibold shadow-md">
            Upload
          </button>
          <button type="button" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition font-semibold shadow-md">
            Add Student
          </button>
        </form>

        <!-- Search Bar -->
        <div class="mt-4">
          <input type="text" id="searchInput" placeholder="Search students..." class="w-full max-w-md border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
        </div>

        <!-- Table Section -->
        <div class="bg-gray-50 border border-gray-300 rounded shadow-inner p-4 mt-4">
          <table class="min-w-full border border-gray-300 rounded overflow-hidden shadow-sm">
            <thead class="bg-gray-200 text-gray-700 text-sm">
              <tr>
                <th class="text-left px-4 py-3 border-b border-gray-300">Student Name</th>
                <th class="text-left px-4 py-3 border-b border-gray-300">Course</th>
                <th class="text-left px-4 py-3 border-b border-gray-300">Year</th>
                <th class="text-left px-4 py-3 border-b border-gray-300">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example rows, you can replace with actual data from the database -->
              <tr class="border-b border-gray-300 hover:bg-gray-100 transition">
                <td class="px-4 py-3">Maria Santos</td>
                <td class="px-4 py-3">BS Computer Science</td>
                <td class="px-4 py-3">2nd Year</td>
                <td class="px-4 py-3 space-x-3">
                  <button class="bg-green-600 text-white px-3 py-1 rounded shadow hover:bg-green-700 transition font-semibold" type="button">Update</button>
                  <button class="bg-red-600 text-white px-3 py-1 rounded shadow hover:bg-red-700 transition font-semibold" type="button">Drop</button>
                </td>
              </tr>
              <!-- Add more rows as necessary -->
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>
</div>
@endsection
