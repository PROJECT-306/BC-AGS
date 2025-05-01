@extends('layouts.app')

@section('content')
    <div class="py-0" x-data="{ openAdd: false, editModal: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Departments</h3>

                    <!-- Add Button -->
                    <button @click="openAdd = true"
                        class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a Department
                    </button>

                    <!-- Add Modal -->
                    <div x-show="openAdd" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                        <div @click.away="openAdd = false" class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-3">Add Department</h3>
                            <form method="POST" action="{{ route('departments.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-900 text-sm font-bold mb-2">Department Name</label>
                                    <input type="text" name="department_name" required
                                        class="w-full px-4 py-2 rounded-md border border-gray-500"
                                        placeholder="e.g. Computer Science">
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
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200 mt-6">
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-6 py-3 text-left">Department Name</th>
                                <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4">{{ $department->department_name }}</td>
                                    <td class="px-6 py-4 flex space-x-2 items-center">
                                        <button @click="editModal = {{ $department->department_id }}"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                                            Edit
                                        </button>

                                        <form method="POST" action="{{ route('departments.destroy', $department->department_id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this department?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>

                                        <!-- Edit Modal -->
                                        <div x-show="editModal === {{ $department->department_id }}" x-cloak
                                            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                                            <div @click.away="editModal = null" class="bg-white w-full max-w-xl p-6 rounded-lg shadow-lg">
                                                <h3 class="text-lg font-semibold mb-3">Edit Department</h3>
                                                <form method="POST" action="{{ route('departments.update', $department->department_id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-4">
                                                        <label class="block text-gray-900 text-sm font-bold mb-2">Department Name</label>
                                                        <input type="text" name="department_name"
                                                            value="{{ $department->department_name }}" required
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
