<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Class Section
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Class Section</h3>

                    <form method="POST" action="{{ route('class-sections.store') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="class_section_name" class="block text-white text-sm font-semibold mb-2">Class Section Name</label>
                            <input id="class_section_name" type="text" name="class_section_name" class="w-full p-3 border rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('class_section_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="user_id" class="block text-white text-sm font-semibold mb-2">Instructor</label>
                            <select id="user_id" name="user_id" class="w-full p-3 border rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="" disabled selected>Select Instructor</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="academic_year_id" class="block text-white text-sm font-semibold mb-2">Academic Year</label>
                            <select id="academic_year_id" name="academic_year_id" class="w-full p-3 border rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="" disabled selected>Select Academic Year</option>
                                @foreach ($academicYears as $year)
                                    <option value="{{ $year->academic_year_id }}">{{ $year->year_start }} - {{$year->year_end}}</option>
                                @endforeach
                            </select>
                            @error('academic_year_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="subject_id" class="block text-white text-sm font-semibold mb-2">Subject</label>
                            <select id="subject_id" name="subject_id" class="w-full p-3 border rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="" disabled selected>Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Add Class Section
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
