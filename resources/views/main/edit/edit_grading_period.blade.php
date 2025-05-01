<div x-data="{ editModalOpen: null }">
    @foreach($departments as $department)
        <!-- Edit Button Trigger -->
        <button 
            @click="editModalOpen = {{ $department->department_id }}" 
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm"
        >
            Edit
        </button>

        <!-- Edit Department Modal -->
        <div 
            x-show="editModalOpen === {{ $department->department_id }}" 
            x-cloak 
            class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
        >
            <div 
                @click.away="editModalOpen = null" 
                class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg"
            >
                <h3 class="text-lg font-semibold mb-4">Edit Department</h3>

                @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('departments.update', $department->department_id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-900 text-sm font-bold mb-2">Department Name</label>
                        <input type="text" name="department_name" value="{{ old('department_name', $department->department_name) }}" required
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
</div>
