<?php

namespace App\Http\Controllers;

use App\Models\
{
    Subject,
    Course,
};
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(
            [
                "course"
            ]
        )->get();

        return view("main.view.view_subjects", compact("subjects"));
    }

    public function create()
    {
        $courses = Course::all();

        return view("main.add.add_subjects", compact("courses"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|unique:subjects,subject_name',
            'course_id' => 'required|exists:courses,course_id',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index',)->with('success', 'Subject Added');
    }

    public function show($id)
    {
        return response()->json(Subject::with('course')->findOrFail($id));
    }

    public function edit($id)
    {
        $subjects = Subject::findOrFail($id);
        $courses = Course::all();

        return view("main.edit.edit_subjects", compact("subjects", "courses"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_name' => 'required|string|unique:subjects,subject_name',
            'course_id' => 'required|exists:courses,course_id',
        ]);

        $subjects = Subject::findOrFail($id);
        $subjects->update($request->all());

        return redirect()->route('subjects.index',)->with('success', 'Subject Updated');
    }

    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect()->route('subjects.index',)->with('success', 'Subject Deleted');
    }
}
