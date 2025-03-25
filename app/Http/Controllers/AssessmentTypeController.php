<?php

namespace App\Http\Controllers;

use App\Models\AssessmentType;
use Illuminate\Http\Request;

class AssessmentTypeController extends Controller
{
    public function index()
    {
        return response()->json(AssessmentType::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:assessment_types,name',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $assessmentType = AssessmentType::create($request->all());
        return response()->json($assessmentType, 201);
    }

    public function show($id)
    {
        return response()->json(AssessmentType::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $assessmentType = AssessmentType::findOrFail($id);
        $assessmentType->update($request->all());
        return response()->json($assessmentType);
    }

    public function destroy($id)
    {
        AssessmentType::destroy($id);
        return response()->json(['message' => 'Assessment Type deleted']);
    }
}
