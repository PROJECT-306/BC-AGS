<!-- Edit Modal Trigger Button inside the assessment list -->
@foreach($assessmentTypes as $assessmentType)
    <button 
        @click="editModalOpen = {{ $assessmentType->assessment_type_id }}" 
        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm"
    >
        Edit
    </button>

    <!-- Edit Modal -->
    <div 
        x-show="editModalOpen === {{ $assessmentType->assessment_type_id }}" 
        x-cloak 
        x-data="{ editModalOpen: null }" 
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
    >
        <div 
            @click.away="editModalOpen = null" 
            class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg"
        >
            <h3 class="text-lg font-semibold mb-3">Edit Assessment Type</h3>

            <form method="POST" action="{{ route('assessment-types.update', $assessmentType->assessment_type_id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Name</label>
                    <input type="text" name="assessment_name" value="{{ $assessmentType->assessment_name }}" required 
                           class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-900 text-sm font-bold mb-2">Weight</label>
                    <input type="number" step="0.01" name="weight" value="{{ $assessmentType->weight }}" required
                           class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="editModalOpen = null"
                            class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit"
                            class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach
