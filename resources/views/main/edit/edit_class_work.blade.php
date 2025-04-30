@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Edit Class Work Trigger Button -->
            @foreach($classWorks as $classWork)
                <button 
                    @click="editModalOpen = {{ $classWork->class_work_id }}" 
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm"
                >
                    Edit
                </button>

                <!-- Edit Class Work Modal -->
                <div 
                    x-show="editModalOpen === {{ $classWork->class_work_id }}" 
                    x-cloak 
                    x-data="{ editModalOpen: null }" 
                    class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
                >
                    <div 
                        @click.away="editModalOpen = null" 
                        class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg"
                    >
                        <h3 class="text-lg font-semibold mb-3">Edit Class Work</h3>

                        <form method="POST" action="{{ route('class-works.update', $classWork->class_work_id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Subject -->
                            <div class="mb-4">
                                <label class="block text-gray-900 text-sm font-bold mb-2">Subject</label>
                                <select name="subject_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                                    <option value="" disabled>Select a subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject_id }}" {{ $classWork->subject_id == $subject->subject_id ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Instructor -->
                            <div class="mb-4">
                                <label class="block text-gray-900 text-sm font-bold mb-2">Instructor</label>
                                <select name="instructor_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                                    <option value="" disabled>Select an instructor</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}" {{ $classWork->instructor_id == $instructor->id ? 'selected' : '' }}>
                                            {{ $instructor->first_name }} {{ $instructor->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Assessment Type -->
                            <div class="mb-4">
                                <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Type</label>
                                <select name="assessment_type_id" required class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                                    <option value="" disabled>Select an assessment type</option>
                                    @foreach ($assessmentTypes as $type)
                                        <option value="{{ $type->assessment_type_id }}" {{ $classWork->assessment_type_id == $type->assessment_type_id ? 'selected' : '' }}>
                                            {{ $type->assessment_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Total Items -->
                            <div class="mb-4">
                                <label class="block text-gray-900 text-sm font-bold mb-2">Total Items</label>
                                <input type="number" name="total_items" value="{{ $classWork->total_items }}" required
                                       class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            </div>

                            <!-- Due Date -->
                            <div class="mb-6">
                                <label class="block text-gray-900 text-sm font-bold mb-2">Due Date</label>
                                <input type="date" name="due_date" value="{{ $classWork->due_date }}" required
                                       class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end space-x-2">
                                <button type="button" @click="editModalOpen = null" 
                                        class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                    Cancel
                                </button>
                                <button type="submit" 
                                        class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
