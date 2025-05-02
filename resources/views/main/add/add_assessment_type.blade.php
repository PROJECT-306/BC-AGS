@extends('layouts.app') <!-- Replace with your layout name if different -->

@section('content')
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-[#EAF8E7] border-b border-gray-200">
            

                @if ($errors->any())
                    <div class="mb-4 px-4 py-3 text-red-800 bg-red-200 border border-red-400 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold mb-3">Add New Assessment Type</h3>
                    <form method="POST" action="{{ route('assessment-types.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-900 text-sm font-bold mb-2">Assessment Name</label>
                            <input type="text" name="assessment_name" value="{{ old('assessment_name') }}" 
                                   class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            @error('assessment_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-900 text-sm font-bold mb-2">Weight</label>
                            <input type="number" step="0.01" name="weight" 
                                   class="w-full px-4 py-2 rounded-md bg-white text-black border border-gray-500">
                            @error('weight')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700">
                            Add
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
