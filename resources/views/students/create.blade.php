<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Add New Student</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('students.store') }}" class="student-form">
        @csrf
        <div>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div>
            <label for="middlename">Middle Name</label>
            <input type="text" id="middlename" name="middlename">
        </div>
        <div>
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div>
            <label for="course_id">Course</label>
            <select id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="year_level">Year Level</label>
            <input type="number" id="year_level" name="year_level" required>
        </div>
        <button type="submit">Add Student</button>
    </form>
</x-app-layout> 