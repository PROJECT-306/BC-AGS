<?php

namespace App\Http\Controllers;

use App\Models\ClassWork;
use Illuminate\Http\Request;

class ClassWorkController extends Controller
{
    public function index()
    {
        return response()->json(ClassWork::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'instructor_id' => 'required|exists:instructors,id',
            'assessment_type_id' => 'required|exists:assessment_types,id',
            'title' => 'required|string',
            'total_score' => 'required|integer|min:1',
        ]);

        $classWork = ClassWork::create($request->all());
        return response()->json($classWork, 201);
    }

    public function show($id)
    {
        return response()->json(ClassWork::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $classWork = ClassWork::findOrFail($id);
        $classWork->update($request->all());
        return response()->json($classWork);
    }

    public function destroy($id)
    {
        ClassWork::destroy($id);
        return response()->json(['message' => 'Class Work deleted']);
    }
}
