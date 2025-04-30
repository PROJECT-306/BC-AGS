@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Student</h3>

                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="block text-white">First Name</label>
                            <input type="text" name="first_name" id="first_name"
                                   class="w-full p-2 border rounded-md @error('first_name') border-red-500 @enderror" required>
                            @error('first_name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-white">Last Name</label>
                            <input type="text" name="last_name" id="last_name"
                                   class="w-full p-2 border rounded-md @error('last_name') border-red-500 @enderror" required>
                            @error('last_name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="birthdate" class="block text-white">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate"
                                   class="w-full p-2 border rounded-md @error('birthdate') border-red-500 @enderror" required>
                            @error('birthdate')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-white">Gender</label>
                            <select name="gender" id="gender"
                                    class="w-full p-2 border rounded-md @error('gender') border-red-500 @enderror" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="course_id" class="block text-white">Course</label>
                            <select name="course_id" id="course_id"
                                    class="w-full p-2 border rounded-md @error('course_id') border-red-500 @enderror" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                                class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add Student
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
