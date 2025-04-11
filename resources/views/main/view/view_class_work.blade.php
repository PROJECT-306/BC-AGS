<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Class Works
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of Class Works</h3>

                    <a href="{{route ('class-works.create')}}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Class Work
                    </a>

                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr class="text-white">
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Assessment Type</th>
                                <th class="px-6 py-3">Instructor</th>
                                <th class="px-6 py-3">Total Items</th>
                                <th class="px-6 py-3">Due Date</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classWorks as $classWork)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $classWork->class_work_id }}</td>
                                    <td class="px-6 py-4">{{ $classWork->class_work_title }}</td>
                                    <td class="px-6 py-4">{{ $classWork->subject->subject_name }}</td>
                                    <td class="px-6 py-4">{{ $classWork->user->first_name .", ". $classWork->user->last_name }}</td>
                                    <td class="px-6 py-4">{{ $classWork->total_items}}</td>
                                    <td class="px-6 py-4">
                                        @if($classWork->due_date)
                                            {{ \Carbon\Carbon::parse($classWork->due_date)->format('F d, Y') }}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                            <a href="{{route ('class-works.edit', $classWork->class_work_id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        
                                            <form method="POST" action="{{ route('class-works.destroy', $classWork->class_work_id) }}" 
                                            onsubmit="return confirm('Are you sure you want to delete this class work? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                      
                                                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                    Delete
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
