<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-black border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4 text-white">List of User Roles</h3>

                    <a href="{{route ('user-roles.create')}}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add a User Role
                    </a>
                    <table class="min-w-full bg-black text-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">User Role Name</th>
                                <th class="px-6 py-4 text-left">Role Number</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userRoles as $userRole)
                                <tr class="hover:bg-white hover:text-black">
                                    <td class="px-6 py-4">{{ $userRole->user_role_name }}</td>
                                    <td class="px-6 py-4">{{ $userRole->user_role_number }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{route ('user-roles.edit', $userRole->user_role_id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                                        <form method="POST" action="{{ route('user-roles.destroy', $userRole->user_role_id) }}" 
                                            onsubmit="return confirm('Are you sure you want to delete this user role? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                      
                                                <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-red-700">
                                                    Delete
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
