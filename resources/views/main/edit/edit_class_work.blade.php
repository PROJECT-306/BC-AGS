<div class="max-w-4xl mx-auto sm:px-6 lg:px-8" x-data="{ editModalOpen: null }">
    @foreach($classWorks as $classWork)
        <!-- Edit Button -->
        <button 
            @click="editModalOpen = {{ $classWork->class_work_id }}" 
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm"
        >
            Edit
        </button>

        <!-- Edit Class Work Modal -->
        <div 
            x-show="editModalOpen === {{ $classWork->class_work_id }}" 
            x-cloak 
            class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
        >
            <div 
                @click.away="editModalOpen = null" 
                class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg"
            >
                <h3 class="text-lg font-semibold mb-3">Edit Class Work</h3>

<<<<<<< HEAD
                    <form method="POST" action="{{ route('class-works.update', $classWork->class_work_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-white" for="class_section_id">Class Section</label>
                            <select name="class_section_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a class section</option>
                                @foreach ($classSections as $section)
                                    <option value="{{ $section->class_section_id }}" {{ $classWork->class_section_id == $section->class_section_id ? 'selected' : '' }}>
                                        {{ $section->class_section_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="class_work_title">Title</label>
                            <input type="text" name="class_work_title" value="{{ $classWork->class_work_title }}" class="w-full p-2 rounded" required placeholder="e.g. Quiz 1, Prelim Exam">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="assessment_type_id">Assessment Type</label>
                            <select name="assessment_type_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select an assessment type</option>
                                @foreach ($assessmentTypes as $type)
                                    <option value="{{ $type->assessment_type_id }}" {{ $classWork->assessment_type_id == $type->assessment_type_id ? 'selected' : '' }}>
                                        {{ $type->assessment_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="total_items">Total Items</label>
                            <input type="number" name="total_items" value="{{ $classWork->total_items }}" class="w-full p-2 rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="due_date">Due Date</label>
                            <input type="date" name="due_date" value="{{ $classWork->due_date }}" class="w-full p-2 rounded" required>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update Class Work
=======
                <form method="POST" action="{{ route('class-works.update', $classWork->class_work_id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Subject -->
                    <div class="mb-4">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Subject</label>
                        <select name="subject_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            <option value="" disabled>Select a subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject_id }}" {{ $classWork->subject_id == $subject->subject_id ? 'selected' : '' }}>
                                    {{ $subject->subject_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Instructor -->
                    <div class="mb-4">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Instructor</label>
                        <select name="instructor_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            <option value="" disabled>Select an instructor</option>
                            @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->id }}" {{ $classWork->instructor_id == $instructor->id ? 'selected' : '' }}>
                                    {{ $instructor->first_name }} {{ $instructor->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Assessment Type -->
                    <div class="mb-4">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Type</label>
                        <select name="assessment_type_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            <option value="" disabled>Select an assessment type</option>
                            @foreach ($assessmentTypes as $type)
                                <option value="{{ $type->assessment_type_id }}" {{ $classWork->assessment_type_id == $type->assessment_type_id ? 'selected' : '' }}>
                                    {{ $type->assessment_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total Items -->
                    <div class="mb-4">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Total Items</label>
                        <input type="number" name="total_items" value="{{ $classWork->total_items }}" required
                               class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                    </div>

                    <!-- Due Date -->
                    <div class="mb-6">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Due Date</label>
                        <input type="date" name="due_date" value="{{ $classWork->due_date }}" required
                               class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="editModalOpen = null" 
                                class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update
>>>>>>> origin/kyle-policies
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
