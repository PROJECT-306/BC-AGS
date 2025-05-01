<!-- Alpine.js Add Semester Modal -->
<div x-data="{ openAdd: false }">

    <!-- Trigger Button -->
    <button @click="openAdd = true" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 mb-4">
        Add New Semester
    </button>

    <!-- Modal Background -->
    <div x-show="openAdd" x-transition class="fixed inset-0 bg-black bg-opacity-25 flex items-center justify-center z-50">
        <div @click.away="openAdd = false" class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4">Add Semester</h3>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('semesters.store') }}" class="space-y-6">
                @csrf

                <div class="mb-4">
                    <label for="semester_name" class="block">Semester Name</label>
                    <input type="text" name="semester_name" id="semester_name" class="w-full p-2 rounded" required placeholder="Enter semester name">
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="openAdd = false" class="bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                        Add Semester
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
