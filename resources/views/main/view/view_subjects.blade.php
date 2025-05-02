@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-green-50 border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Subjects</h3>

                    <a href="{{ route('subjects.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-blue-700 mb-4">
                        Add a Subject
                    </a>

<<<<<<< HEAD
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
=======
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200 shadow-md">
>>>>>>> origin/kyle-policies
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-4 py-3 text-left">Subject Name</th>
                                <th class="px-4 py-3 text-left">Course</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-4 py-3">{{ $subject->subject_name }}</td>
                                    <td class="px-4 py-3">{{ $subject->course->course_name }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2 items-center justify-start">
                                            <a href="{{ route('subjects.edit', $subject->subject_id) }}" 
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('subjects.destroy', $subject->subject_id) }}"
                                                  onsubmit="return confirm('Are you sure you want to delete this subject? This action cannot be undone.');"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
