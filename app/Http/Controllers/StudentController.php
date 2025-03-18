<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $courses = Course::all(); // Fetch all courses to populate the dropdown
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'year_level' => 'required|integer',
        ]);

        Student::create($request->all());

        return redirect()->route('students.create')->with('success', 'Student added successfully!');
    }
} 