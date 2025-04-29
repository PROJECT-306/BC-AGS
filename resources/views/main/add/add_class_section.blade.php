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

                        <div class="mb-4">
                            <label class="block text-white mb-1">Class Section Name</label>
                            <input type="text" name="class_section_name" class="w-full rounded-md p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-white mb-1">Instructor</label>
                            <select name="user_id" class="w-full rounded-md p-2" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-white mb-1">Academic Year</label>
                            <select name="academic_year_id" class="w-full rounded-md p-2" required>
                                @foreach ($academicYears as $year)
                                    <option value="{{ $year->academic_year_id }}">{{ $year->year_start }} - {{$year->year_end}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
