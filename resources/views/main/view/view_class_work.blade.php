@extends('layouts.app')

@section('content')
    <div class="py-0" x-data="{ openAdd: false, editModal: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Class Works</h3>

<<<<<<< HEAD
                    <a href="{{ route('class-works.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Class Work
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
=======
                    <!-- Trigger Add Modal Button -->
                    <button @click="openAdd = true" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Class Work
                    </button>
>>>>>>> origin/kyle-policies

                    <!-- Add Class Work Modal -->
                    <div x-show="openAdd" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                        <div @click.away="openAdd = false" class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-3">Add Class Work</h3>
                            <form method="POST" action="{{ route('class-works.store') }}">
                                @csrf
                                <!-- Fields -->
                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Subject</label>
                                    <select name="subject_id" required class="w-full px-4 py-2 rounded-md border border-gray-500">
                                        <option disabled selected>Select a subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Title</label>
                                    <input type="text" name="class_work_title" required class="w-full px-4 py-2 rounded-md border border-gray-500" placeholder="e.g. Quiz 1">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Type</label>
                                    <select name="assessment_type_id" required class="w-full px-4 py-2 rounded-md border border-gray-500">
                                        <option disabled selected>Select an assessment type</option>
                                        @foreach ($assessmentTypes as $type)
                                            <option value="{{ $type->assessment_type_id }}">{{ $type->assessment_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Instructor</label>
                                    <select name="instructor_id" required class="w-full px-4 py-2 rounded-md border border-gray-500">
                                        <option disabled selected>Select an instructor</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Total Items</label>
                                    <input type="number" name="total_items" required class="w-full px-4 py-2 rounded-md border border-gray-500">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Due Date</label>
                                    <input type="date" name="due_date" required class="w-full px-4 py-2 rounded-md border border-gray-500">
                                </div>

                                <!-- Buttons -->
                                <div class="flex justify-end space-x-2">
                                    <button type="button" @click="openAdd = false" class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">Cancel</button>
                                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Table -->
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200 mt-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Class Section</th>
                                <th class="px-6 py-3">Total Items</th>
                                <th class="px-6 py-3">Due Date</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classWorks as $classWork)
<<<<<<< HEAD
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $classWork->class_work_id }}</td>
                                    <td class="px-6 py-4">{{ $classWork->class_work_title }}</td>
                                    <td class="px-6 py-4">{{ $classWork->classSection->class_section_name }}</td>
                                    <td class="px-6 py-4">{{ $classWork->total_items }}</td>
                                    <td class="px-6 py-4">
                                        @if($classWork->due_date)
                                            {{ \Carbon\Carbon::parse($classWork->due_date)->format('F d, Y') }}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('class-works.edit', $classWork->class_work_id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        
                                        <form method="POST" action="{{ route('class-works.destroy', $classWork->class_work_id) }}" 
                                        onsubmit="return confirm('Are you sure you want to delete this class work? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
=======
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-6 py-4">{{ $classWork->class_work_id }}</td>
                                <td class="px-6 py-4">{{ $classWork->class_work_title }}</td>
                                <td class="px-6 py-4">{{ $classWork->subject?->subject_name ?? 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    {{ $classWork->user ? $classWork->user->first_name . ', ' . $classWork->user->last_name : 'N/A' }}
                                </td>
                                <td class="px-6 py-4">{{ $classWork->total_items }}</td>
                                <td class="px-6 py-4">
                                    @if($classWork->due_date)
                                        {{ \Carbon\Carbon::parse($classWork->due_date)->format('F d, Y') }}
                                    @else
                                        Not Set
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('class-works.edit', $classWork->class_work_id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form method="POST" action="{{ route('class-works.destroy', $classWork->class_work_id) }}" 
                                        onsubmit="return confirm('Are you sure you want to delete this class work? This action cannot be undone.');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach                        
>>>>>>> origin/kyle-policies
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</x-app-layout>

=======
@endsection
>>>>>>> origin/kyle-policies
