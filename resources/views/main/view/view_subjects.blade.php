@extends('layouts.app')

@section('content')
    <h3 class="text-xl font-bold mb-4">List of Subjects</h3>

    <a href="{{ route('subjects.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
        Add a Subject
    </a>

    <table class="min-w-full bg-black text-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-4 text-left">Subject Name</th>
                <th class="px-6 py-4 text-left">Course</th>
                <th class="px-6 py-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr class="hover:bg-white hover:text-black">
                    <td class="px-6 py-4">{{ $subject->subject_name }}</td>
                    <td class="px-6 py-4">{{ $subject->course->course_name }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('subjects.edit', $subject->subject_id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                        <form method="POST" action="{{ route('subjects.destroy', $subject->subject_id) }}" 
                            onsubmit="return confirm('Are you sure you want to delete this subject? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                    Delete
                                </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
