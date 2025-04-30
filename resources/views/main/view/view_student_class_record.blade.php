@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Student Class Records</h3>

                    <a href="{{ route('student-class-records.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add Record
                    </a>

                    @if($studentClassRecord->isEmpty())
                        <p class="text-gray-400">No student class records found.</p>
                    @else
                        <table class="min-w-full bg-white text-gray-800 border border-gray-200">
                            <thead>
                                <tr class="text-gray-800">
                                    <th class="px-6 py-3">Student Name</th>
                                    <th class="px-6 py-3">Subject</th>
                                    <th class="px-6 py-3">Grading Period</th>
                                    <th class="px-6 py-3">Quizzes</th>
                                    <th class="px-6 py-3">OCR</th>
                                    <th class="px-6 py-3">Exams</th>
                                    <th class="px-6 py-3">Final Grade</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentClassRecord as $record)
                                    <tr class="hover:bg-gray-100 transition-colors">
                                        <td class="px-6 py-4">{{ $record->student->first_name }} {{ $record->student->last_name }}</td>
                                        <td class="px-6 py-4">{{ $record->subject->subject_name }}</td>
                                        <td class="px-6 py-4">{{ $record->gradingPeriod->grading_period_name }}</td>
                                        <td class="px-6 py-4">{{ $record->quizzes }}</td>
                                        <td class="px-6 py-4">{{ $record->ocr }}</td>
                                        <td class="px-6 py-4">{{ $record->exams }}</td>
                                        <td class="px-6 py-4 font-semibold">{{ number_format($record->final_grade, 2) }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2 items-center justify-start">
                                                <a href="{{ route('student-class-records.edit', $record->student_class_record_id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Edit
                                                </a>

                                                <form action="{{ route('student-class-records.destroy', $record->student_class_record_id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline-block">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
