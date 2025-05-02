@extends('layouts.app')

@section('content')
    <div class="py-6" x-data="{ openAdd: false, editModal: null }">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Grading Periods</h3>

                    <!-- Add Button -->
                    <button @click="openAdd = true"
                        class="bg-green-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-blue-700 mb-4">
                        Add a Grading Period
<<<<<<< HEAD
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
                    </button>

                    <!-- Add Modal -->
                    <div x-show="openAdd" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                        <div @click.away="openAdd = false" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-3">Add Grading Period</h3>
                            <form method="POST" action="{{ route('grading-periods.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Grading Period Name</label>
                                    <input type="text" name="grading_period_name" required
                                        class="w-full px-4 py-2 rounded-md border border-gray-500"
                                        placeholder="e.g. First Grading">
                                </div>

                                <div class="flex justify-end space-x-2">
                                    <button type="button" @click="openAdd = false"
                                        class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">Cancel</button>
                                    <button type="submit"
                                        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Table -->
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200">
>>>>>>> origin/kyle-policies
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-4 py-3 text-left">Grading Period Name</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gradingPeriods as $gradingPeriod)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-4 py-3">{{ $gradingPeriod->grading_period_name }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2 items-center">
                                            <!-- Edit Button -->
                                            <button @click="editModal = {{ $gradingPeriod->grading_period_id }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded">
                                                Edit
                                            </button>

                                            <!-- Delete Form -->
                                            <form method="POST" action="{{ route('grading-periods.destroy', $gradingPeriod->grading_period_id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this grading period?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>

                                            <!-- Edit Modal -->
                                            <div x-show="editModal === {{ $gradingPeriod->grading_period_id }}" x-cloak
                                                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                                <div @click.away="editModal = null" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                                                    <h3 class="text-lg font-semibold mb-3">Edit Grading Period</h3>
                                                    <form method="POST" action="{{ route('grading-periods.update', $gradingPeriod->grading_period_id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-4">
                                                            <label class="block text-gray-900 text-sm font-bold mb-2">Grading Period Name</label>
                                                            <input type="text" name="grading_period_name"
                                                                value="{{ $gradingPeriod->grading_period_name }}" required
                                                                class="w-full px-4 py-2 rounded-md border border-gray-500">
                                                        </div>

                                                        <div class="flex justify-end space-x-2">
                                                            <button type="button" @click="editModal = null"
                                                                class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-600">Cancel</button>
                                                            <button type="submit"
                                                                class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End Edit Modal -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
