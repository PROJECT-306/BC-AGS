@extends('layouts.app')

@section('content')
    <div class="py-6" x-data="{ openAdd: false, editModal: null }">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Semesters</h3>

                    <!-- Add Button -->
                    <button @click="openAdd = true"
                        class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Semester
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
                            <h3 class="text-lg font-semibold mb-3">Add Semester</h3>
                            <form method="POST" action="{{ route('semesters.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Semester Name</label>
                                    <input type="text" name="semester_name" required
                                        class="w-full px-4 py-2 rounded-md border border-gray-500"
                                        placeholder="e.g First Semester, Second Semester">
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
                                <th class="px-6 py-3 text-left">Semester Name</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semesters as $semester)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4">{{ $semester->semester_name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2 items-center">
                                            <!-- Edit Button -->
                                            <button @click="editModal = {{ $semester->semester_id }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                                                Edit
                                            </button>

                                            <!-- Delete Form -->
                                            <form method="POST" action="{{ route('semesters.destroy', $semester->semester_id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this semester?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div x-show="editModal === {{ $semester->semester_id }}" x-cloak
                                            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                            <div @click.away="editModal = null" class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg">
                                                <h3 class="text-lg font-semibold mb-3">Edit Semester</h3>
                                                <form method="POST" action="{{ route('semesters.update', $semester->semester_id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-4">
                                                        <label class="block text-gray-900 text-sm font-bold mb-2">Semester Name</label>
                                                        <input type="text" name="semester_name"
                                                            value="{{ $semester->semester_name }}" required
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
