<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Add Student Class Work
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Student Class Work</h3>

                    <form method="POST" action="{{ route('student-class-works.store') }}" class="space-y-6">
                        @csrf

                        <div class="mb-4">
                            <label class="text-white" for="student_id">Student</label>
                            <select name="student_id" id="student_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->student_id }}">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="class_work_id">Class Work</label>
                            <select name="class_work_id" id="class_work_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a class work</option>
                                @foreach ($classWorks as $classWork)
                                    <option value="{{ $classWork->class_work_id }}" data-total-items="{{ $classWork->total_items }}">
                                        {{ $classWork->class_work_title }} ({{ $classWork->subject->subject_name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="assessment_type_id">Assessment Type</label>
                            <select name="assessment_type_id" id="assessment_type_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select an assessment type</option>
                                @foreach ($assessmentTypes as $type)
                                    <option value="{{ $type->assessment_type_id }}">
                                        {{ $type->assessment_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="raw_score">Raw Score</label>
                            <input type="number" name="raw_score" id="raw_score" class="w-full p-2 rounded" required min="0" max="100">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="total_items">Total Items</label>
                            <input type="number" name="total_items" id="total_items" class="w-full p-2 rounded" readonly>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add Record
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('class_work_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption) {
                const totalItems = selectedOption.dataset.totalItems;
                document.getElementById('total_items').value = totalItems;
            }
        });
    </script>
</x-app-layout>
