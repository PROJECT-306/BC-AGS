<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Final Grades
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200 text-white">
                    <h3 class="text-xl font-bold mb-4">List of Final Grades</h3>

                    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add Grade
                    </a>

                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Student ID</th>
                                <th class="px-4 py-2 border">Student Name</th>
                                <th class="px-4 py-2 border">Class Section</th>
                                <th class="px-4 py-2 border">Academic Year</th>
                                <th class="px-4 py-2 border">Subject</th>
                                <th class="px-4 py-2 border">Prelim</th>
                                <th class="px-4 py-2 border">Midterm</th>
                                <th class="px-4 py-2 border">Prefinal</th>
                                <th class="px-4 py-2 border">Finals</th>
                                <th class="px-4 py-2 border">Final Grade</th>
                                <th class="px-4 py-2 border">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($grades as $grade)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-4 py-2 border">{{ $grade->StudentID }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->StudentName }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->ClassSectionName }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->AcademicYear }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->SubjectName }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->Prelim ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->Midterm ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->Prefinal ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->Finals ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">{{ $grade->FinalGrade ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">
                                        <span class="{{ $grade->Remarks === 'Passed' ? 'text-green-400' : 'text-red-400' }}">
                                            {{ $grade->Remarks ?? 'N/A' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center py-4">No data available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

