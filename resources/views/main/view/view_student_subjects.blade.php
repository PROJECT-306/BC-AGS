<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Subjects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Student Subjects</h3>

                    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Student Subject
                    </a>
                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">Student Name</th>
                                <th class="px-6 py-4 text-left">Subject</th>
                                <th class="px-6 py-4 text-left">Semester</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentSubjects as $studentSubject)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $studentSubject->student->first_name }} {{ $studentSubject->student->last_name }}</td>
                                    <td class="px-6 py-4">{{ $studentSubject->subject->subject_name }}</td>
                                    <td class="px-6 py-4">{{ $studentSubject->semester->semester_name }}</td>
                                    <td class="px-6 py-4">
                                        <x-dropdown-link>
                                            Edit
                                        </x-dropdown-link>
                                        <x-dropdown-link>
                                            Delete
                                        </x-dropdown-link>
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

