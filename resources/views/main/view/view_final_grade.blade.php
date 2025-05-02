@extends('layouts.app')

@section('content')
    <h3 class="text-xl font-bold mb-4">List of the (Insert Table Name)</h3>

<<<<<<< HEAD
                    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
                        Add An Table
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
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left">Test</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-white hover:text-black">
                                <td class="px-6 py-4">Test</td>
                                    <x-dropdown-link>
                                        Edit
                                    </x-dropdown-link>
                                    <x-dropdown-link>
                                        Delete
                                    </x-dropdown-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
    <a href="#" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 mb-4">
        Add A Table
    </a>
    <table class="min-w-full bg-black text-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-4 text-left">Test</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-white hover:text-black">
                <td class="px-6 py-4">Test</td>
                <td class="px-6 py-4">
                    <x-dropdown-link>
                        Edit
                    </x-dropdown-link>
                    <x-dropdown-link>
                        Delete
                    </x-dropdown-link>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
>>>>>>> origin/kyle-policies
