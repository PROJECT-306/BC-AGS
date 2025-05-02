@extends('layouts.app')

@section('content')
    <h3 class="text-xl font-bold mb-4">List of Student Class Works</h3>

    <a href="{{ route('student-class-works.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
        Add Record
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

                    @if($studentClassWork->isEmpty())
                        <p class="text-gray-400">No student class work records found.</p>
                    @else
                        <table class="w-full text-white">
                            <thead>
                                <tr class="bg-gray-800">
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Class Work</th>
                                    <th class="px-4 py-2">Raw Score</th>
                                    <th class="px-4 py-2">Total Items</th>
                                    <th class="px-4 py-2">Computed Score</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentClassWork as $record)
                                    <tr>
                                        <td class="px-4 py-2">{{ $record->student->first_name }} {{ $record->student->last_name }}</td>
                                        <td class="px-4 py-2">{{ $record->classWork->class_work_title }} ({{ $record->classWork->subject->subject_name }})</td>
                                        <td class="px-4 py-2">{{ $record->raw_score }}</td>
                                        <td class="px-4 py-2">{{ $record->total_items }}</td>
                                        <td class="px-4 py-2 font-semibold">{{ number_format($record->computed_score, 2) }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <a href="#" class="text-blue-400 hover:underline text-sm">Edit</a>
                                            <form action="{{ route('student-class-works.destroy', $record->student_class_work_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
=======
    @if($studentClassWork->isEmpty())
        <p class="text-gray-400">No student class work records found.</p>
    @else
        <table class="w-full text-white">
            <thead>
                <tr class="bg-gray-800">
                    <th class="px-4 py-2">Student Name</th>
                    <th class="px-4 py-2">Class Work</th>
                    <th class="px-4 py-2">Raw Score</th>
                    <th class="px-4 py-2">Total Items</th>
                    <th class="px-4 py-2">Computed Score</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentClassWork as $record)
                <tr>
                    <td class="px-4 py-2">
                        {{ $record->student?->first_name }} {{ $record->student?->last_name ?? 'N/A' }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $record->classWork?->class_work_title ?? 'N/A' }} 
                        ({{ $record->classWork?->subject?->subject_name ?? 'N/A' }})
                    </td>
                    <td class="px-4 py-2">{{ $record->raw_score }}</td>
                    <td class="px-4 py-2">{{ $record->total_items }}</td>
                    <td class="px-4 py-2 font-semibold">{{ number_format($record->computed_score, 2) }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="#" class="text-blue-400 hover:underline text-sm">Edit</a>
                        <form action="{{ route('student-class-works.destroy', $record->student_class_work_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
@endsection
>>>>>>> origin/kyle-policies
