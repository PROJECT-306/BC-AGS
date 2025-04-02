<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Subject
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Subject</h3>

                    <form method="POST" action="{{ route('subjects.store') }}">
                        @csrf

                        <!-- Subject Name -->
                        <div class="mb-4">
                            <label for="subject_name" class="text-white">Subject Name</label>
                            <input type="text" id="subject_name" name="subject_name" 
                            class="w-full p-2 border rounded-md" required>
                            @error('subject_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Course Selection -->
                        <div class="mb-4">
                            <label for="course_id" class="text-white">Course</label>
                            <select id="course_id" name="course_id" class="w-full p-2 border rounded-md" required>
                                <option value="" disabled>Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_id }}">
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add Subject
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
