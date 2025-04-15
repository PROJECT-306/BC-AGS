@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#C1E6BA]">

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        {{-- Verify Instructor Section --}}
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Verify Instructor</h3>
            <div class="flex items-center space-x-4 mb-4">
                <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md" />
                <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Send Invitation</button>
            </div>
            <h4 class="font-semibold mb-2">To be Verified Instructors</h4>
            <table class="w-full text-left border-t">
                <thead>
                    <tr>
                        <th class="py-2">Email</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2">john.doe@example.com</td>
                        <td class="py-2">Pending</td>
                    </tr>
                    <tr>
                        <td class="py-2">jane.smith@example.com</td>
                        <td class="py-2">Accepted</td>
                    </tr>
                </tbody>
            </table>
        </section>

        {{-- Manage Instructor Section --}}
        <section class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold mb-4">Manage Instructor</h3>
            <table class="w-full text-left border-t">
                <thead>
                    <tr>
                        <th class="py-2">Instructor ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Department</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2">1</td>
                        <td class="py-2">John Doe</td>
                        <td class="py-2">john.doe@example.com</td>
                        <td class="py-2">Computer Science</td>
                        <td class="py-2 space-x-2">
                            <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2">2</td>
                        <td class="py-2">Jane Smith</td>
                        <td class="py-2">jane.smith@example.com</td>
                        <td class="py-2">Mathematics</td>
                        <td class="py-2 space-x-2">
                            <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection
