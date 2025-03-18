<x-app-layout>
    <form method="POST" action="{{ route('grades.store') }}">
        @csrf
        <div>
            <label for="student_id">Student</label>
            <select id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->middlename }} {{ $student->surname }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <h3>Assignments</h3>
        <table>
            <thead>
                <tr>
                    <th>Assignment Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody id="assignmentRows">
                <tr>
                    <td><input type="text" name="assignments[0][name]" required /></td>
                    <td><input type="number" name="assignments[0][grade]" required /></td>
                </tr>
            </tbody>
        </table>
        <button type="button" onclick="addAssignmentRow()">Add Assignment</button>

        <h3>Exams</h3>
        <table>
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody id="examRows">
                <tr>
                    <td><input type="text" name="exams[0][name]" required /></td>
                    <td><input type="number" name="exams[0][grade]" required /></td>
                </tr>
            </tbody>
        </table>
        <button type="button" onclick="addExamRow()">Add Exam</button>

        <button type="submit">Submit Grades</button>
    </form>

    <script>
        function addAssignmentRow() {
            const rowCount = document.querySelectorAll('#assignmentRows tr').length;
            const newRow = `<tr>
                <td><input type="text" name="assignments[${rowCount}][name]" required /></td>
                <td><input type="number" name="assignments[${rowCount}][grade]" required /></td>
            </tr>`;
            document.getElementById('assignmentRows').insertAdjacentHTML('beforeend', newRow);
        }

        function addExamRow() {
            const rowCount = document.querySelectorAll('#examRows tr').length;
            const newRow = `<tr>
                <td><input type="text" name="exams[${rowCount}][name]" required /></td>
                <td><input type="number" name="exams[${rowCount}][grade]" required /></td>
            </tr>`;
            document.getElementById('examRows').insertAdjacentHTML('beforeend', newRow);
        }
    </script>
</x-app-layout> 