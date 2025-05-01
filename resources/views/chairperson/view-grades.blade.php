@extends('layouts.app')

@section('content')
<div class="p-6 bg-green-100 min-h-screen">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">View Grades</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-green-600 text-white text-left">
                        <th class="py-3 px-4">Student ID</th>
                        <th class="py-3 px-4">Student Name</th>
                        <th class="py-3 px-4">Course</th>
                        <th class="py-3 px-4">Grade</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr>
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Alice Johnson</td>
                        <td class="py-2 px-4">CS101</td>
                        <td class="py-2 px-4">A</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">2</td>
                        <td class="py-2 px-4">Bob Smith</td>
                        <td class="py-2 px-4">MATH201</td>
                        <td class="py-2 px-4">B+</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">3</td>
                        <td class="py-2 px-4">Charlie Brown</td>
                        <td class="py-2 px-4">ENG101</td>
                        <td class="py-2 px-4">A-</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">4</td>
                        <td class="py-2 px-4">David Wilson</td>
                        <td class="py-2 px-4">HIST202</td>
                        <td class="py-2 px-4">B</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">5</td>
                        <td class="py-2 px-4">Eva Green</td>
                        <td class="py-2 px-4">BIO101</td>
                        <td class="py-2 px-4">A</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">6</td>
                        <td class="py-2 px-4">Frank White</td>
                        <td class="py-2 px-4">CHEM101</td>
                        <td class="py-2 px-4">B-</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">7</td>
                        <td class="py-2 px-4">Grace Lee</td>
                        <td class="py-2 px-4">PHYS101</td>
                        <td class="py-2 px-4">A+</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">8</td>
                        <td class="py-2 px-4">Henry Adams</td>
                        <td class="py-2 px-4">CS102</td>
                        <td class="py-2 px-4">B</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">9</td>
                        <td class="py-2 px-4">Ivy Clark</td>
                        <td class="py-2 px-4">MATH202</td>
                        <td class="py-2 px-4">A-</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4">10</td>
                        <td class="py-2 px-4">Jack Davis</td>
                        <td class="py-2 px-4">ENG102</td>
                        <td class="py-2 px-4">B+</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
