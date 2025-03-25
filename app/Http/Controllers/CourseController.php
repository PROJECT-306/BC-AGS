<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::with('department')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:courses,name',
            'department_id' => 'required|exists:departments,id',
        ]);

        $course = Course::create($request->only('name', 'department_id'));
        return response()->json($course, 201);
    }

    public function show($id)
    {
        return response()->json(Course::with('department')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->only('name', 'department_id'));
        return response()->json($course);
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return response()->json(['message' => 'Course deleted']);
    }
}
