<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Assessment Type
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Edit Assessment Type</h3>

                    <!-- Success Notification -->
                    @if(session('success'))
                        <div class="mb-4 px-4 py-3 text-green-800 bg-green-200 border border-green-400 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Notifications -->
                    @if ($errors->any())
                        <div class="mb-4 px-4 py-3 text-red-800 bg-red-200 border border-red-400 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('assessment-types.update', $assessmentType->assessment_type_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-white text-sm font-bold mb-2">Assessment Name</label>
                            <input type="text" name="assessment_name" value="{{ $assessmentType->assessment_name }}" 
                                   class="w-full px-4 py-2 rounded-md bg-gray-700 text-black border border-gray-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-white text-sm font-bold mb-2">Weight</label>
                            <input type="number" step="0.01" name="weight" value="{{ $assessmentType->weight }}" 
                                   class="w-full px-4 py-2 rounded-md bg-gray-700 text-black border border-gray-500">
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Update
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
