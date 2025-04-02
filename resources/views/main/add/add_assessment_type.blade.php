<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Assessment Type
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add an Assessment Type</h3>

                    @if ($errors->any())
                        <div class="mb-4 px-4 py-3 text-red-800 bg-red-200 border border-red-400 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <h4 class="text-lg font-semibold text-white mb-3">Add New Assessment Type</h4>
                        <form method="POST" action="{{ route('assessment-types.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-white text-sm font-bold mb-2">Assessment Name</label>
                                <input type="text" name="assessment_name" value="{{ old('assessment_name') }}" 
                                       class="w-full px-4 py-2 rounded-md bg-gray-700 text-black border border-gray-500">
                                @error('assessment_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white text-sm font-bold mb-2">Weight</label>
                                <input type="number" step="0.01" name="weight" 
                                       class="w-full px-4 py-2 rounded-md bg-gray-700 text-black border border-gray-500">
                                @error('weight')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                                Add
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
