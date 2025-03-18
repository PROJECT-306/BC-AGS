<x-app-layout>
    <h1>Grades</h1>
    <a href="{{ route('grades.create') }}">Add New Grade</a>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->student->full_name }}</td>
                    <td>{{ $grade->course->course_name }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>
                        <a href="{{ route('grades.edit', $grade->id) }}">Edit</a>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout> 