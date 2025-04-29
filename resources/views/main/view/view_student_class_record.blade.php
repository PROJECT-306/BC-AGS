<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Student Class Records
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Student Class Records</h3>

                    <a href="{{ route('student-class-records.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add Record
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

                    @if($studentClassRecord->isEmpty())
                        <p class="text-gray-400">No student class records found.</p>
                    @else
                        <table class="w-full text-white">
                            <thead>
                                <tr class="bg-gray-800">
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Subject</th>
                                    <th class="px-4 py-2">Grading Period</th>
                                    <th class="px-4 py-2">Quizzes</th>
                                    <th class="px-4 py-2">OCR</th>
                                    <th class="px-4 py-2">Exams</th>
                                    <th class="px-4 py-2">Final Grade</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentClassRecord as $record)
                                    <tr>
                                        <td class="px-4 py-2">{{ $record->student->first_name }} {{ $record->student->last_name }}</td>
                                        <td class="px-4 py-2">{{ $record->subject->subject_name }}</td>
                                        <td class="px-4 py-2">{{ $record->gradingPeriod->grading_period_name }}</td>
                                        <td class="px-4 py-2">{{ $record->quizzes }}</td>
                                        <td class="px-4 py-2">{{ $record->ocr }}</td>
                                        <td class="px-4 py-2">{{ $record->exams }}</td>
                                        <td class="px-4 py-2 font-semibold">{{ number_format($record->final_grade, 2) }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <a href="{{ route('student-class-records.edit', $record->student_class_record_id) }}" class="text-blue-400 hover:underline text-sm">Edit</a>
                                            <form action="{{ route('student-class-records.destroy', $record->student_class_record_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:underline text-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
