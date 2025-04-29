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

                    <form method="POST" action="{{ route('final-grades.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_id">
                                Student
                            </label>
                            <select name="student_id" id="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="" disabled selected>Select a student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->student_id }}">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_id">
                                Subject
                            </label>
                            <input type="text" name="subject_name" id="subject_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
<input type="hidden" name="subject_id" id="subject_id" required>
                            @error('subject_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="semester_id">
                                Semester
                            </label>
                            <input type="text" name="semester_name" id="semester_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
<input type="hidden" name="semester_id" id="semester_id" required>
                            @error('semester_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="grade">
                                Grade
                            </label>
                            <input type="number" name="grade" id="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" min="0" max="100" required readonly>
                            @error('grade')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Final Grade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const studentSelect = document.getElementById('student_id');
    const subjectInput = document.getElementById('subject_name');
    const subjectIdInput = document.getElementById('subject_id');
    const semesterInput = document.getElementById('semester_name');
    const semesterIdInput = document.getElementById('semester_id');
    const gradeInput = document.getElementById('grade');

    function fetchStudentData() {
        const studentId = studentSelect.value;
        if (!studentId) return;
        fetch(`/final-grades/fetch-student-data?student_id=${studentId}`)
            .then(response => response.json())
            .then(data => {
                // Fill subject and semester directly from the record
                if (data.subject) {
                    subjectInput.value = data.subject.subject_name;
                    subjectIdInput.value = data.subject.subject_id;
                } else {
                    subjectInput.value = '';
                    subjectIdInput.value = '';
                }
                if (data.semester) {
                    semesterInput.value = data.semester.semester_name;
                    semesterIdInput.value = data.semester.semester_id;
                } else {
                    semesterInput.value = '';
                    semesterIdInput.value = '';
                }
                // Set grade
                if (data.grade !== null && typeof data.grade !== 'undefined') {
                    gradeInput.value = data.grade;
                } else {
                    gradeInput.value = '';
                }
            });
    }

    // When student changes, auto-fill subject, semester, and grade
    studentSelect.addEventListener('change', function() {
        fetchStudentData();
    });
});
</script>
</x-app-layout>