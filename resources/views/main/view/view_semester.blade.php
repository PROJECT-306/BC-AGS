@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Semesters</h3>

                    <a href="{{ route('semesters.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Semester
                    </a>
    
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200">
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-6 py-3 text-left">Semester Name</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semesters as $semester)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <!-- Semester Name Column -->
                                    <td class="px-6 py-4">{{ $semester->semester_name }}</td>

                                    <!-- Actions Column (Aligned buttons) -->
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2 items-center justify-start">
                                            <a href="{{ route('semesters.edit', $semester->semester_id) }}" 
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('semesters.destroy', $semester->semester_id) }}" 
                                                onsubmit="return confirm('Are you sure you want to delete this semester? This action cannot be undone.');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
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
