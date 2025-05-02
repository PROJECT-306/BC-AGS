<!-- Alpine.js Add Class Work Modal -->
<div x-data="{ openAdd: false }">

    <!-- Trigger Button -->
    <button @click="openAdd = true" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 mb-4">
        Add Class Work
    </button>

    <!-- Modal Background -->
    <div x-show="openAdd" x-transition class="fixed inset-0 bg-black bg-opacity-25 flex items-center justify-center z-50">
        <div @click.away="openAdd = false" class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Add Class Work</h3>

            <form method="POST" action="{{ route('class-works.store') }}" class="space-y-6">
                @csrf

                <div class="mb-4">
                    <label for="subject_id" class="block">Subject</label>
                    <select name="subject_id" id="subject_id" class="w-full p-2 rounded" required>
                        <option value="" disabled selected>Select a subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="class_work_title" class="block">Title</label>
                    <input type="text" name="class_work_title" id="class_work_title" class="w-full p-2 rounded" required placeholder="e.g. Quiz 1, Prelim Exam">
                </div>

                <div class="mb-4">
                    <label for="assessment_type_id" class="block">Assessment Type</label>
                    <select name="assessment_type_id" id="assessment_type_id" class="w-full p-2 rounded" required>
                        <option value="" disabled selected>Select an assessment type</option>
                        @foreach ($assessmentTypes as $type)
                            <option value="{{ $type->assessment_type_id }}">{{ $type->assessment_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="instructor_id" class="block">Instructor</label>
                    <select name="instructor_id" id="instructor_id" class="w-full p-2 rounded" required>
                        <option value="" disabled selected>Select an instructor</option>
                        @foreach ($instructors as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="total_items" class="block">Total Items</label>
                    <input type="number" name="total_items" id="total_items" class="w-full p-2 rounded" required min="1">
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block">Due Date</label>
                    <input type="date" name="due_date" id="due_date" class="w-full p-2 rounded" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="openAdd = false" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                        Add Class Work
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
