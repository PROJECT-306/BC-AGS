<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Add Student Class Record
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Student Class Record</h3>

                    <form method="POST" action="{{ route('student-class-records.store') }}" class="space-y-6">
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
                            <label class="text-white" for="subject_id">Subject</label>
                            <select name="subject_id" id="subject_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}">
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="grading_period_id">Grading Period</label>
                            <select name="grading_period_id" id="grading_period_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a grading period</option>
                                @foreach ($gradingPeriods as $period)
                                    <option value="{{ $period->grading_period_id }}">
                                        {{ $period->grading_period_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="quizzes">Quizzes (40%)</label>
                            <input type="number" name="quizzes" id="quizzes" class="w-full p-2 rounded" min="0" max="100">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="ocr">OCR (20%)</label>
                            <input type="number" name="ocr" id="ocr" class="w-full p-2 rounded" min="0" max="100">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="exams">Exams (40%)</label>
                            <input type="number" name="exams" id="exams" class="w-full p-2 rounded" min="0" max="100">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="final_grade">Final Grade</label>
                            <input type="number" name="final_grade" id="final_grade" class="w-full p-2 rounded" readonly>
                        </div>

                        <script>
                            // Initialize scores to 0 when page loads
                            document.getElementById('quizzes').value = 0;
                            document.getElementById('ocr').value = 0;
                            document.getElementById('exams').value = 0;
                            document.getElementById('final_grade').value = 0;

                            // Update scores when student is selected
                            document.getElementById('student_id').addEventListener('change', function() {
                                const studentId = this.value;
                                
                                if (studentId) {
                                    fetch(`/student-class-records/${studentId}/scores`)
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById('quizzes').value = data.quizzes || 0;
                                            document.getElementById('ocr').value = data.ocr || 0;
                                            document.getElementById('exams').value = data.exams || 0;
                                            document.getElementById('final_grade').value = data.final_grade || 0;
                                        })
                                        .catch(error => {
                                            console.error('Error fetching scores:', error);
                                            // If there's an error, keep the default values
                                            document.getElementById('quizzes').value = 0;
                                            document.getElementById('ocr').value = 0;
                                            document.getElementById('exams').value = 0;
                                            document.getElementById('final_grade').value = 0;
                                        });
                                } else {
                                    // If no student is selected, reset to 0
                                    document.getElementById('quizzes').value = 0;
                                    document.getElementById('ocr').value = 0;
                                    document.getElementById('exams').value = 0;
                                    document.getElementById('final_grade').value = 0;
                                }
                            });
                        </script>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add Record
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
