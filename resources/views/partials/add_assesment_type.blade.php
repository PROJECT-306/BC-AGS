<!-- Modal Background -->
<div x-data="{ open: false }">
    <button @click="open = true" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
        Add New Assessment Type
    </button>

    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div @click.away="open = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold mb-3">Add New Assessment Type</h3>

            <form method="POST" action="{{ route('assessment-types.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Name</label>
                    <input type="text" name="assessment_name" value="{{ old('assessment_name') }}"
                           class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                    @error('assessment_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-900 text-sm font-bold mb-2">Weight</label>
                    <input type="number" step="0.01" name="weight"
                           class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                    @error('weight')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="open = false" class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
