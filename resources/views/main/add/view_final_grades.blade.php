<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Final Grade
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">Add Final Grade</h3>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('final-grades.calculate') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_id">
                                Student
                            </label>
                            <select id="student_id" name="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select a student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->student_id }}" {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
                                        {{ $student->last_name }}, {{ $student->first_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_id">
                                Subject
                            </label>
                            <select id="subject_id" name="subject_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select a subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}" {{ old('subject_id') == $subject->subject_id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="semester_id">
                                Semester
                            </label>
                            <select id="semester_id" name="semester_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select a semester</option>
                                @foreach($semesters as $semester)
                                    <option value="{{ $semester->semester_id }}" {{ old('semester_id') == $semester->semester_id ? 'selected' : '' }}>
                                        {{ $semester->semester_name }}
                                    </option>
                                @endforeach
                            </select>
                        <div class="mb-4" id="final-grade-container" style="display: none;">
                            <h4 class="text-lg font-bold mb-2">Final Grade</h4>
                            <div id="final-grade">
                                <!-- Final grade will be populated here by JavaScript -->
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Calculate Final Grade
                            </button>
                        </div>

                        <div class="mt-4" id="grade-display" style="display: none;">
                            <h4 class="text-lg font-bold mb-2">Calculated Final Grade</h4>
                            <div class="p-4 bg-gray-50 border rounded">
                                <p class="text-xl font-bold" id="final-grade-value"></p>
                            </div>
                        </div>
                        </div>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const studentSelect = document.getElementById('student_id');
                            const subjectSelect = document.getElementById('subject_id');
                            const semesterSelect = document.getElementById('semester_id');
                            const gradingPeriodsContainer = document.getElementById('grading-periods-container');
                            const gradingPeriodsDiv = document.getElementById('grading-periods');

                            function fetchGrades() {
                                const studentId = studentSelect.value;
                                const subjectId = subjectSelect.value;
                                const semesterId = semesterSelect.value;

                                if (!studentId || !subjectId || !semesterId) {
                                    gradingPeriodsContainer.style.display = 'none';
                                    return;
                                }

                                fetch(`/api/final-grades/get-grades?student_id=${studentId}&subject_id=${subjectId}&semester_id=${semesterId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        gradingPeriodsContainer.style.display = 'block';
                                        gradingPeriodsDiv.innerHTML = `
                                            <div class="mb-2">
                                                <label class="block text-gray-700 text-sm font-bold mb-1">Prelim Grade:</label>
                                                <input type="text" value="${data.prelim || ''}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label class="block text-gray-700 text-sm font-bold mb-1">Midterm Grade:</label>
                                                <input type="text" value="${data.midterm || ''}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label class="block text-gray-700 text-sm font-bold mb-1">Prefinal Grade:</label>
                                                <input type="text" value="${data.prefinal || ''}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label class="block text-gray-700 text-sm font-bold mb-1">Final Grade:</label>
                                                <input type="text" value="${data.final || ''}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                                            </div>
                                        `;

                                        // Show the grade display section
                                        const gradeDisplay = document.getElementById('grade-display');
                                        gradeDisplay.style.display = 'block';

                                        // Fetch and display the calculated final grade
                                        fetch(`/api/final-grades/get-final-grade?student_id=${studentId}&subject_id=${subjectId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const finalGradeValue = document.getElementById('final-grade-value');
                                                finalGradeValue.textContent = data.final_grade || 'N/A';
                                            })
                                            .catch(error => console.error('Error fetching final grade:', error));
                                    })
                                    .catch(error => console.error('Error:', error));
                            }

                            studentSelect.addEventListener('change', fetchGrades);
                            subjectSelect.addEventListener('change', fetchGrades);
                            semesterSelect.addEventListener('change', fetchGrades);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
