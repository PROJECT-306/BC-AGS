<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return response()->json(Subject::with('course')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:subjects,name',
            'course_id' => 'required|exists:courses,id',
        ]);

        $subject = Subject::create($request->only('name', 'course_id'));
        return response()->json($subject, 201);
    }

    public function show($id)
    {
        return response()->json(Subject::with('course')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->only('name', 'course_id'));
        return response()->json($subject);
    }

    public function destroy($id)
    {
        Subject::destroy($id);
        return response()->json(['message' => 'Subject deleted']);
    }
}
