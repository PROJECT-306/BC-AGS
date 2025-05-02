@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-50 border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">Add Course</h3>

                    <!-- Button to trigger modal -->
                    <button @click="open = true" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                        Add New Course
                    </button>

                    <!-- Modal Background -->
                    <div x-data="{ open: false }">
                        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
