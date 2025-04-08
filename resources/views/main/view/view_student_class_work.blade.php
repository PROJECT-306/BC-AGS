<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Student Class Work Records
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Student Class Works</h3>

                    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add Record
                    </a>

                    @if($studentClassWork->isEmpty())
                        <p class="text-gray-400">No student class work records found.</p>
                    @else
                        <table class="min-w-full bg-black text-white border border-gray-200 rounded-md">
                            <thead>
                                <tr class="bg-gray-800">
                                    <th class="px-4 py-3 text-left text-sm">ID</th>
                                    <th class="px-4 py-3 text-left text-sm">Student ID</th>
                                    <th class="px-4 py-3 text-left text-sm">Subject ID</th>
                                    <th class="px-4 py-3 text-left text-sm">Assessment Type</th>
                                    <th class="px-4 py-3 text-left text-sm">Raw Score</th>
                                    <th class="px-4 py-3 text-left text-sm">Total Items</th>
                                    <th class="px-4 py-3 text-left text-sm">Computed Score</th>
                                    <th class="px-4 py-3 text-left text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentClassWork as $record)
                                    <tr class="hover:bg-white hover:text-black transition duration-150">
                                        <td class="px-4 py-2">{{ $record->id }}</td>
                                        <td class="px-4 py-2">{{ $record->student_id }}</td>
                                        <td class="px-4 py-2">{{ $record->subject_id }}</td>
                                        <td class="px-4 py-2">{{ $record->assessment_type_id }}</td>
                                        <td class="px-4 py-2">{{ $record->raw_score }}</td>
                                        <td class="px-4 py-2">{{ $record->total_items }}</td>
                                        <td class="px-4 py-2 font-semibold">{{ number_format($record->computed_score, 2) }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <a href="#" class="text-blue-400 hover:underline text-sm">Edit</a>
                                            <form action="{{ route('student-class-work.destroy', $record->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:underline text-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
