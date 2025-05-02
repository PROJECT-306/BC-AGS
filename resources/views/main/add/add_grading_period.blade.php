@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-green-50 border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">Add Grading Period</h3>

                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('grading-periods.store') }}">
                        @csrf

                        <div class="mb-4">
                            Grading Period Name
                            <input type="text" name="grading_period_name" class="w-full p-2 rounded" required>
                        </div>

                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700">
                            Add Grading Period
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
