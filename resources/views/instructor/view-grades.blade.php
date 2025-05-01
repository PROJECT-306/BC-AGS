@extends('layouts.app')

@section('content')

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <h2 class="font-bold text-[#023336] mb-4 text-sm">ASBME Department</h2>

            <!-- Subject Select & Print -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0 max-w-md mb-4">
                <label for="subject-select" class="block text-gray-700 font-semibold text-sm sm:text-base">
                    Select Subject:
                </label>
                <select id="subject-select" class="border border-gray-300 rounded px-6 py-2 w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="IT306">IT306</option>
                    <option value="IT307">IT307</option>
                    <option value="IT308">IT308</option>
                    <option value="IT309">IT309</option>
                </select>
                <button @click="printGrades" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 transition font-semibold flex items-center space-x-2">
                    <i class="fas fa-print"></i>
                    <span>Print</span>
                </button>
            </div>

            <!-- Grades Table -->
            <div class="bg-gray-50 border border-gray-300 rounded shadow-inner p-4 overflow-x-auto" id="printable-area">
                <table class="min-w-full border border-gray-300 rounded overflow-hidden shadow-sm">
                    <thead class="bg-gray-200 text-gray-700 text-xs sm:text-sm">
                        <tr>
                            <th class="text-left px-4 py-3 border-b">Student Name</th>
                            <th class="text-center px-4 py-3 border-b">Prelim</th>
                            <th class="text-center px-4 py-3 border-b">Midterm</th>
                            <th class="text-center px-4 py-3 border-b">Prefinal</th>
                            <th class="text-center px-4 py-3 border-b">Final</th>
                            <th class="text-center px-4 py-3 border-b">Average</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 text-xs sm:text-sm">
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">Maria Santos</td>
                            <td class="text-center px-4 py-3 font-semibold">85.50</td>
                            <td class="text-center px-4 py-3 font-semibold">88.00</td>
                            <td class="text-center px-4 py-3 font-semibold">90.25</td>
                            <td class="text-center px-4 py-3 font-semibold">92.00</td>
                            <td class="text-center px-4 py-3 font-bold text-green-700">88.44</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">Juan Dela Cruz</td>
                            <td class="text-center px-4 py-3 font-semibold">78.00</td>
                            <td class="text-center px-4 py-3 font-semibold">80.50</td>
                            <td class="text-center px-4 py-3 font-semibold">82.75</td>
                            <td class="text-center px-4 py-3 font-semibold">85.00</td>
                            <td class="text-center px-4 py-3 font-bold text-green-700">81.56</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">Ana Reyes</td>
                            <td class="text-center px-4 py-3 font-semibold">90.00</td>
                            <td class="text-center px-4 py-3 font-semibold">92.50</td>
                            <td class="text-center px-4 py-3 font-semibold">94.00</td>
                            <td class="text-center px-4 py-3 font-semibold">95.50</td>
                            <td class="text-center px-4 py-3 font-bold text-green-700">92.50</td>
                        </tr>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-3">Carlos Mendoza</td>
                            <td class="text-center px-4 py-3 font-semibold">70.00</td>
                            <td class="text-center px-4 py-3 font-semibold">72.25</td>
                            <td class="text-center px-4 py-3 font-semibold">75.00</td>
                            <td class="text-center px-4 py-3 font-semibold">77.50</td>
                            <td class="text-center px-4 py-3 font-bold text-green-700">73.69</td>
                        </tr>
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">Liza Gomez</td>
                            <td class="text-center px-4 py-3 font-semibold">88.00</td>
                            <td class="text-center px-4 py-3 font-semibold">90.00</td>
                            <td class="text-center px-4 py-3 font-semibold">91.50</td>
                            <td class="text-center px-4 py-3 font-semibold">93.00</td>
                            <td class="text-center px-4 py-3 font-bold text-green-700">90.63</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
