@extends('layouts.app')

@section('content')
    <h3 class="text-xl font-bold mb-4">List of the (Insert Table Name)</h3>

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
