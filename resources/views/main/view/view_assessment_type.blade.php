@extends('layouts.app')

@section('content')
    <div class="py-0" x-data="{ open: false, errorsExist: false, editModal: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Assessment Types</h3>

<<<<<<< HEAD
                    <a href="{{route ('assessment-types.create')}}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add An Assessment Type
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
=======
                    <!-- Modal Trigger Button -->
                    <div>
                        <button @click="open = true" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                            Add New Assessment Type
                        </button>

                        <!-- Modal Container -->
                        <div 
                            x-show="open" 
                            x-cloak
                            x-transition
                            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
                            @keydown.escape.prevent
                        >
                            <!-- Modal Content (Prevent closing on click outside) -->
                            <div 
                                @click.away="open = false" 
                                class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg"
                            >
                                <h3 class="text-lg font-semibold mb-3">Add New Assessment Type</h3>

                                <form method="POST" action="{{ route('assessment-types.store') }}" 
                                      x-on:submit.prevent="errorsExist = $el.querySelectorAll('.error').length > 0">
                                    @csrf

                                    <!-- Assessment Name Field -->
                                    <div class="mb-4">
                                        <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Name</label>
                                        <input type="text" name="assessment_name" value="{{ old('assessment_name') }}"
                                               class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500 @error('assessment_name') border-red-500 @enderror" required>
                                        @error('assessment_name')
                                            <p class="text-red-500 text-xs mt-1 error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Weight Field -->
                                    <div class="mb-4">
                                        <label class="block text-gray-900 text-sm font-bold mb-2">Weight</label>
                                        <input type="number" step="0.01" name="weight" required
                                               class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500 @error('weight') border-red-500 @enderror">
                                        @error('weight')
                                            <p class="text-red-500 text-xs mt-1 error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="flex justify-end space-x-2">
                                        <button 
                                            type="button" 
                                            @click="open = false" 
                                            class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                            Cancel
                                        </button>
                                        <button 
                                            type="submit" 
                                            :disabled="errorsExist"
                                            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                                            Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Table for Assessment Types -->
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200 mt-6">
>>>>>>> origin/kyle-policies
                        <thead>
                            @if ($assessmentTypes->isEmpty())
                                <tr>
                                    <th class="px-6 py-4 text-left">Assessment</th>
                                </tr>
                            @else
                                <tr>
                                    <th class="px-6 py-4 text-left">Assessment Type ID</th>
                                    <th class="px-6 py-4 text-left">Assessment Name</th>
                                    <th class="px-6 py-4 text-left">Weight</th>
                                    <th class="px-6 py-4 text-left">Actions</th>
                                </tr>
                            @endif
                        </thead>
                        <tbody>
                            @if ($assessmentTypes->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        No Assessment Types Found
                                    </td>
                                </tr>
                            @else
                                @foreach($assessmentTypes as $assessmentType)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4">{{ $assessmentType->assessment_type_id }}</td>
                                        <td class="px-6 py-4">{{ $assessmentType->assessment_name }}</td>
                                        <td class="px-6 py-4">{{ $assessmentType->weight }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button 
                                                    @click="editModal = {{ $assessmentType->assessment_type_id }}"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                                                >
                                                    Edit
                                                </button>

                                                <form method="POST" action="{{ route('assessment-types.destroy', $assessmentType->assessment_type_id) }}"
                                                      onsubmit="return confirm('Are you sure you want to delete this assessment type? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Edit Modal -->
                                            <div 
                                                x-show="editModal === {{ $assessmentType->assessment_type_id }}" 
                                                x-cloak 
                                                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
                                            >
                                                <div 
                                                    @click.away="editModal = null" 
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
                                                            <button type="button" @click="editModal = null"
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
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
