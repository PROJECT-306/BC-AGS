<!-- Edit Course Modal -->
<div x-show="editOpen" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div @click.away="editOpen = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">

        <h3 class="text-lg font-semibold mb-3">Edit Course</h3>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('courses.update', $courses->course_id ?? 0) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-900 text-sm font-bold mb-2">Course Name</label>
                <input type="text" name="course_name" value="{{ old('course_name', $courses->course_name ?? '') }}"
                       class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-900 text-sm font-bold mb-2">Department</label>
                <select name="department_id"
                        class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500" required>
                    <option value="" disabled>Select a department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->department_id }}"
                            {{ (isset($courses) && $courses->department_id == $department->department_id) ? 'selected' : '' }}>
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
