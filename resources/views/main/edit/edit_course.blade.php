<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Edit Course</h3>

                    @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('courses.update', $courses->course_id) }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-white">Course Name</label>
                            <input type="text" name="course_name" value="{{ old('course_name', $courses->course_name) }}" class="w-full p-2 rounded" required>

                        </div>

                        <div class="mb-4">
                            <label class="text-white">Department</label>
                            <select name="department_id" class="w-full p-2 rounded" required>
                                <option value="" disabled>Select a department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_id }}" 
                                        {{ $courses->department_id == $department->department_id ? 'selected' : '' }}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update Course
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
