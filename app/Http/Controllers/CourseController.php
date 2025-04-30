<?php

namespace App\Http\Controllers;

use App\Models\
{
    Course,
    Department,
};
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with("department")->get();
        $departments = Department::all();

        return view("main.view.view_course", compact('courses', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();

        return view("main.add.add_course", compact("departments"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|unique:courses,course_name',
            'department_id' => 'required|exists:departments,department_id',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', "Course Added");
    }

    public function show($id)
    {
        return response()->json(Course::with('department')->findOrFail($id));
    }

    public function edit($id)
    {
        $courses = Course::findOrFail($id);
        $departments = Department::all();

        return view("main.edit.edit_course", compact("courses", "departments"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|unique:courses,course_name',
            'department_id' => 'required|exists:departments,department_id',
        ]);

        $courses = Course::findOrFail($id);
        $courses->update($request->all());

        return redirect()->route('courses.index')->with('success', "Course Updated");
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('courses.index')->with('success', "Course Deleted");
    }
}
