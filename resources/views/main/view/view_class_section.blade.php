<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Class Sections
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Class Sections</h3>

                    <a href="{{ route('class-sections.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add Class Section
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

                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Instructor</th>
                                <th class="px-6 py-3 text-left">Academic Year</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classSections as $section)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $section->class_section_name }}</td>
                                    <td class="px-6 py-4">{{ $section->user->first_name }} {{ $section->user->last_name }}</td>
                                    <td class="px-6 py-4">
                                    {{ $section->academicYear->year_start }} -
                                    {{ $section->academicYear->year_end }}
                                </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('class-sections.edit', $section->class_section_id) }}" class="text-blue-500 hover:underline mr-4">Edit</a>
                                        <form action="{{ route('class-sections.destroy', $section->class_section_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
