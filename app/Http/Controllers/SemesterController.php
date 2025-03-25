<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        return response()->json(Semester::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_name' => 'required|string|unique:semesters,semester_name',
        ]);

        $semester = Semester::create($request->only('semester_name'));
        return response()->json($semester, 201);
    }

    public function show($id)
    {
        return response()->json(Semester::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);
        $semester->update($request->only('semester_name'));
        return response()->json($semester);
    }

    public function destroy($id)
    {
        Semester::destroy($id);
        return response()->json(['message' => 'Semester deleted']);
    }
}
