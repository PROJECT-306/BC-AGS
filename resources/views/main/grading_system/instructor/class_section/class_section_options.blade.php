<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Test
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Actions for Section</h3>

                    <!-- Flex container for the cards -->
                    <div class="grid grid-cols-2 gap-6">

                        <h4 class="text-2xl font-semibold text-white">Section Name: {{ $classSection->class_section_name }}</h4>
                        <h4 class="text-2xl font-semibold text-white">Subject Name: {{ $subject->subject_name }}</h4>

                        <!-- Student Grades Card -->
                        <!-- Student Grades Card -->
                        <a href="{{ url('class-sections/student-grade') . '?class_section_id=' . $classSection->class_section_id . '&subject_id=' . $subject->subject_id }}" class="block">                      
                        <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md hover:bg-blue-500 transition">
                            <h4 class="text-2xl font-semibold">Student Grades</h4>
                        </div>
                        </a>

                        <!-- Student Records Card -->
                        <a href="{{ url('class-sections/student-scores') . '?class_section_id=' . $classSection->class_section_id . '&subject_id=' . $subject->subject_id }}" class="block">
                            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md hover:bg-green-500 transition">
                                <h4 class="text-2xl font-semibold">Student Records</h4>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
