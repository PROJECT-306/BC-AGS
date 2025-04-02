<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add User Role
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">Add User Role</h3>

                    <form method="POST" action="{{ route('user-roles.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="user_role_number" class="text-white">User Role Number</label>
                            <input type="text" id="user_role_number" name="user_role_number" 
                                   class="w-full p-2 border rounded-md" required>
                            @error('user_role_number')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="user_role_name" class="text-white">User Role Name</label>
                            <input type="text" id="user_role_name" name="user_role_name" 
                                   class="w-full p-2 border rounded-md" required>
                            @error('user_role_name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add User Role
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
