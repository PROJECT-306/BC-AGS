<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Courses
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Courses</h3>

                    <a href="{{route ('courses.create')}}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Course
                    </a>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-600 text-white rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-600 text-white rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-600 text-white rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">Course Name</th>
                                <th class="px-6 py-4 text-left">Department</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $course->course_name }}</td>
                                    <td class="px-6 py-4">
                                        {{ $course->department->department_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route ('courses.edit', $course->course_id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        
                                        <form method="POST" action="{{ route('courses.destroy', $course->course_id) }}" 
                                        onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.');">
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
