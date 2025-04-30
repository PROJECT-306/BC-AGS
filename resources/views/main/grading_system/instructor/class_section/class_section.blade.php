<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Select A Class Section
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
                                <th class="px-6 py-3 text-left">Sections</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classSections as $section)
                            <tr class="bg-gray-800 hover:bg-gray-700 transition-colors duration-200 cursor-pointer text-white"
                            onclick="window.location='{{ url('class-sections/options') . '?class_section_id=' . $section->class_section_id . '&subject_id=' . $section->subject->subject_id }}'">
                                <td class="px-6 py-4 font-medium">{{ $section->class_section_name }}</td>
                                <td class="px-6 py-4 font-medium">{{ $section->subject->subject_name }}</td>
                                <td class="px-6 py-4">{{ $section->user->first_name }} {{ $section->user->last_name }}</td>
                                <td class="px-6 py-4">
                                {{ $section->academicYear->year_start }} -
                                {{ $section->academicYear->year_end }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-3 text-sm" onclick="event.stopPropagation();">
                                    <a href="{{ route('class-sections.edit', $section->class_section_id) }}"
                                   class="inline-flex items-center px-3 py-1 bg-blue-100 text-black rounded-full hover:bg-blue-200 transition">
                                    ✏️ Edit
                                    </a>
                                    <form action="{{ route('class-sections.destroy', $section->class_section_id) }}"
                                      method="POST" class="inline-block"  onsubmit="return confirm('Are you sure you want to delete this section? This action cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 rounded-full  hover:bg-red-200 transition">
                                            🗑️ Delete
                                        </button>
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