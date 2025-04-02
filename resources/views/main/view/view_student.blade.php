<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Students</h3>

                    <a href="{{route ('students.create')}}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Student
                    </a>
                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">Student Number</th>
                                <th class="px-6 py-4 text-left">Name</th>
                                <th class="px-6 py-4 text-left">Course</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $student->student_number }}</td>
                                    <td class="px-6 py-4">{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td class="px-6 py-4">{{ $student->course->course_name }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{route ('students.edit', $student->student_id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                                        <form method="POST" action="{{ route('students.destroy', $student->student_id) }}" 
                                            onsubmit="return confirm('Are you sure you want to delete this semester? This action cannot be undone.');">
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

