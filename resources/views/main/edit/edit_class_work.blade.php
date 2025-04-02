<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Class Work
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Edit Class Work</h3>

                    <form method="POST" action="{{ route('class-works.update', $classWorks->class_work_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-white">Subject</label>
                            <select name="subject_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}" {{ $classWorks->subject_id == $subject->subject_id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="text-white">Instructor</label>
                            <select name="instructor_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select an instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" {{ $classWorks->instructor_id == $instructor->id ? 'selected' : '' }}>
                                        {{ $instructor->first_name }} {{ $instructor->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="text-white">Assessment Type</label>
                            <select name="assessment_type_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select an assessment type</option>
                                @foreach ($assessmentTypes as $type)
                                    <option value="{{ $type->assessment_type_id }}" {{ $classWorks->assessment_type_id == $type->assessment_type_id ? 'selected' : '' }}>
                                        {{ $type->assessment_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white">Total Items</label>
                            <input type="number" name="total_items" value="{{ $classWorks->total_items }}" class="w-full p-2 rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-white">Due Date</label>
                            <input type="date" name="due_date" value="{{ $classWorks->due_date }}" class="w-full p-2 rounded" required>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

