<?php

namespace App\Http\Controllers;

use App\Models\GradingPeriod;
use Illuminate\Http\Request;

class GradingPeriodController extends Controller
{
    public function index()
    {
        return response()->json(GradingPeriod::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:grading_periods,name',
        ]);

        $gradingPeriod = GradingPeriod::create($request->only('name'));
        return response()->json($gradingPeriod, 201);
    }

    public function show($id)
    {
        return response()->json(GradingPeriod::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $gradingPeriod = GradingPeriod::findOrFail($id);
        $gradingPeriod->update($request->only('name'));
        return response()->json($gradingPeriod);
    }

    public function destroy($id)
    {
        GradingPeriod::destroy($id);
        return response()->json(['message' => 'Grading Period deleted']);
    }
}
