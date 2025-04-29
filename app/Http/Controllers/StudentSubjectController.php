<?php

namespace App\Http\Controllers;

use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function index()
    {
        $studentSubjects = StudentSubject::with(
            [
                "student",
                "subject",
                "semester",
            ]
        )->get();

        return view("main.view.view_student_subjects", compact("studentSubjects"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        StudentSubject::create($request->all());
        return redirect()->route('student-subjects.index')->with('success', 'Student Subject Added');
    }

    public function show($id)
    {
        return response()->json(StudentSubject::with(['student', 'subject', 'semester'])->findOrFail($id));
    }

    public function edit($id)
    {
        $studentSubjects = StudentSubject::findOrFail($id);

        return view("main.edit.edit_student_subjects", compact("studentSubjects"));
    }

    public function update(Request $request, StudentSubject $studentSubjects)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        $studentSubjects->update($request->all());

        return redirect()->route('student-subjects.index')->with('success', 'Student Subject Updated');
    }

    public function destroy($id)
    {
        StudentSubject::destroy($id);
        return redirect()->route('student-subjects.index')->with('success', 'Student Subject Deleted');
    }
}
