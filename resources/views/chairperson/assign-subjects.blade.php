@extends('layouts.app') <!-- Assuming you're using a layout file -->

@section('content')
<div class="p-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Assign Subjects to Instructors</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                        <th class="py-2 px-4 border-b">Instructor ID</th>
                        <th class="py-2 px-4 border-b">Instructor Name</th>
                        <th class="py-2 px-4 border-b">Subject ID</th>
                        <th class="py-2 px-4 border-b">Subject Name</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">John Doe</td>
                        <td class="py-2 px-4 border-b">CS101</td>
                        <td class="py-2 px-4 border-b">Introduction to Computer Science</td>
                        <td class="py-2 px-4 border-b">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Edit</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">Jane Smith</td>
                        <td class="py-2 px-4 border-b">MATH201</td>
                        <td class="py-2 px-4 border-b">Calculus I</td>
                        <td class="py-2 px-4 border-b">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Edit</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
