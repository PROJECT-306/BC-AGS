@extends('layouts.app')

@section('content')
    <!-- Alpine.js for modal control -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <div class="py-12" x-data="{ open: false, editOpen: false }"> <!-- Alpine scope -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Courses</h3>

                    <!-- Button to trigger modal -->
                    <button @click="open = true" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 mb-4">
                        Add New Course
                    </button>

                    <!-- Add Course Modal -->
                    <div x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div @click.away="open = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-3">Add New Course</h3>

                            @if ($errors->any())
                                <div class="bg-red-500 text-white p-3 rounded mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('courses.store') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Course Name</label>
                                    <input type="text" name="course_name" value="{{ old('course_name') }}"
                                           class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Department</label>
                                    <select name="department_id" class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
                                        <option value="" disabled selected>Select a department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex justify-end space-x-2">
                                    <button type="button" @click="open = false" class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                        Cancel
                                    </button>
                                    <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                                        Add Course
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Courses Table -->
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200 mt-4">
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-6 py-3">Course Name</th>
                                <th class="px-6 py-3">Department</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4">{{ $course->course_name }}</td>
                                    <td class="px-6 py-4">{{ $course->department->department_name }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <button @click="editOpen = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Edit
                                        </button>

                                        <form method="POST" action="{{ route('courses.destroy', $course->course_id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this course?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>

                                        <!-- Edit Modal (must be loaded with correct data via Livewire or JS for dynamic edit) -->
                                        <div x-show="editOpen" x-transition class="fixed inset-0 bg-black bg-opacity-5 flex items-center justify-center z-50">
                                            <div @click.away="editOpen = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                                                <h3 class="text-lg font-semibold mb-3">Edit Course</h3>

                                                <form method="POST" action="{{ route('courses.update', $course->course_id) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="mb-4">
                                                        <label class="block text-gray-900 text-sm font-bold mb-2">Course Name</label>
                                                        <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}"
                                                               class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="block text-gray-900 text-sm font-bold mb-2">Department</label>
                                                        <select name="department_id" class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
                                                            <option value="" disabled>Select a department</option>
                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->department_id }}"
                                                                    {{ $course->department_id == $department->department_id ? 'selected' : '' }}>
                                                                    {{ $department->department_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="flex justify-end space-x-2">
                                                        <button type="button" @click="editOpen = false" class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                                                            Update Course
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
