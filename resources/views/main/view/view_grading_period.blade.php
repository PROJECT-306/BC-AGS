@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-[#EAF8E7] border-b border-gray-200">
                    <h3 class="text-xl font-bold mb-4">List of Grading Periods</h3>

                    <a href="{{ route('grading-periods.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-blue-700 mb-4">
                        Add a Grading Period
                    </a>
    
                    <table class="min-w-full bg-white text-gray-800 border border-gray-200">
                        <thead>
                            <tr class="text-gray-800">
                                <th class="px-4 py-3 text-left">Grading Period Name</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gradingPeriods as $gradingPeriod)
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <!-- Grading Period Name Column -->
                                    <td class="px-4 py-3">{{ $gradingPeriod->grading_period_name }}</td>

                                    <!-- Actions Column (Aligned buttons) -->
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2 items-center justify-start">
                                            <a href="{{ route('grading-periods.edit', $gradingPeriod->grading_period_id) }}" 
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('grading-periods.destroy', $gradingPeriod->grading_period_id) }}" 
                                                onsubmit="return confirm('Are you sure you want to delete this grading period? This action cannot be undone.');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </form>
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
