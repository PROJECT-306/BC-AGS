<x-app-layout>
    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="student_id">Student</label>
            <select id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                        {{ $student->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $grade->course_id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="grade">Grade</label>
            <input type="number" id="grade" name="grade" value="{{ $grade->grade }}" required />
        </div>
        <button type="submit">Update Grade</button>
    </form>
</x-app-layout> 