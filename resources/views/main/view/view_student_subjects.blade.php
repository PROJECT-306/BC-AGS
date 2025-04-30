@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Student Subjects</h3>

                    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Student Subject
                    </a>

                    <table class="min-w-full bg-white text-gray-800 border border-gray-200">
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-6 py-3 text-left">Student Name</th>
                                <th class="px-6 py-3 text-left">Subject</th>
                                <th class="px-6 py-3 text-left">Semester</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentSubjects as $studentSubject)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4">{{ $studentSubject->student->first_name }} {{ $studentSubject->student->last_name }}</td>
                                    <td class="px-6 py-4">{{ $studentSubject->subject->subject_name }}</td>
                                    <td class="px-6 py-4">{{ $studentSubject->semester->semester_name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2 items-center justify-start">
                                            <x-dropdown-link class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-0 px-1 rounded-md">
                                                Edit
                                            </x-dropdown-link>
                                            <x-dropdown-link class="bg-red-500 hover:bg-red-600 text-white font-semibold py-0 px-1 rounded-md">
                                                Delete
                                            </x-dropdown-link>
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
