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

                    <form method="POST" action="{{ route('class-works.update', $classWork->class_work_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-white" for="class_section_id">Class Section</label>
                            <select name="class_section_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select a class section</option>
                                @foreach ($classSections as $section)
                                    <option value="{{ $section->class_section_id }}" {{ $classWork->class_section_id == $section->class_section_id ? 'selected' : '' }}>
                                        {{ $section->class_section_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="class_work_title">Title</label>
                            <input type="text" name="class_work_title" value="{{ $classWork->class_work_title }}" class="w-full p-2 rounded" required placeholder="e.g. Quiz 1, Prelim Exam">
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="assessment_type_id">Assessment Type</label>
                            <select name="assessment_type_id" class="w-full p-2 rounded" required>
                                <option value="" disabled selected>Select an assessment type</option>
                                @foreach ($assessmentTypes as $type)
                                    <option value="{{ $type->assessment_type_id }}" {{ $classWork->assessment_type_id == $type->assessment_type_id ? 'selected' : '' }}>
                                        {{ $type->assessment_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="total_items">Total Items</label>
                            <input type="number" name="total_items" value="{{ $classWork->total_items }}" class="w-full p-2 rounded" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-white" for="due_date">Due Date</label>
                            <input type="date" name="due_date" value="{{ $classWork->due_date }}" class="w-full p-2 rounded" required>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update Class Work
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

