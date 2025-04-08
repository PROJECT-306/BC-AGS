<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Student Class Work
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Student Class Work</h3>

                    <!-- Form to Add Student Class Work -->
                    <form method="POST" action="{{ route('student-class-works.store') }}">
                        @csrf
                        <!-- Student ID -->
                        <div class="mb-4">
                            <label for="student_id" class="block text-white">Student ID</label>
                            <input type="text" name="student_id" id="student_id" class="mt-1 block w-full rounded-md bg-gray-700 text-white" required>
                        </div>

                        <!-- Class Work ID (Updated) -->
                        <div class="mb-4">
                            <label for="class_work_id" class="block text-white">Class Work ID</label>
                            <input type="text" name="class_work_id" id="class_work_id" class="mt-1 block w-full rounded-md bg-gray-700 text-white" required>
                        </div>

                        <!-- Assessment Type ID -->
                        <div class="mb-4">
                            <label for="assessment_type_id" class="block text-white">Assessment Type ID</label>
                            <input type="text" name="assessment_type_id" id="assessment_type_id" class="mt-1 block w-full rounded-md bg-gray-700 text-white" required>
                        </div>

                        <!-- Raw Score -->
                        <div class="mb-4">
                            <label for="raw_score" class="block text-white">Raw Score</label>
                            <input type="number" name="raw_score" id="raw_score" class="mt-1 block w-full rounded-md bg-gray-700 text-white" min="0" required>
                        </div>

                        <!-- Total Items -->
                        <div class="mb-4">
                            <label for="total_items" class="block text-white">Total Items</label>
                            <input type="number" name="total_items" id="total_items" class="mt-1 block w-full rounded-md bg-gray-700 text-white" min="1" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
