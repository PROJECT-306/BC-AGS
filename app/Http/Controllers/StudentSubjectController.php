<?php

namespace App\Http\Controllers;

use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function index()
    {
        return response()->json(StudentSubject::with(['student', 'subject', 'semester'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        $studentSubject = StudentSubject::create($request->all());
        return response()->json($studentSubject, 201);
    }

    public function show($id)
    {
        return response()->json(StudentSubject::with(['student', 'subject', 'semester'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $studentSubject = StudentSubject::findOrFail($id);
        $studentSubject->update($request->all());
        return response()->json($studentSubject);
    }

    public function destroy($id)
    {
        StudentSubject::destroy($id);
        return response()->json(['message' => 'Student-Subject enrollment deleted']);
    }
}
