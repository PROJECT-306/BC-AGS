<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Academic Year
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add Test</h3>

                    @if ($errors->any())
                        <div class="mb-4 px-4 py-3 text-red-800 bg-red-200 border border-red-400 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('academic-years.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="year_start" class="block text-white font-medium mb-1">Start Year</label>
                            <input type="number" name="year_start" id="year_start" 
                                   class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-green-500"
                                   value="{{ old('year_start') }}" required>
                        </div>
                    
                        <div class="mb-4">
                            <label for="year_end" class="block text-white font-medium mb-1">End Year</label>
                            <input type="number" name="year_end" id="year_end" 
                                   class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-green-500"
                                   value="{{ old('year_end') }}" required>
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