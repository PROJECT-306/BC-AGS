<?php

namespace App\Http\Controllers;

use App\Models\{
    Student,
    Course,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:can-manage-users');
    }

    public function index()
    {
        $this->authorize('viewAny', Student::class);
        
        $students = Student::with(
            [
                "course"
            ]
        )->get();

        return view("main.view.view_student", compact("students"));
    }

    public function create()
    {
        $this->authorize('create', Student::class);
        
        $courses = Course::all();

        return view("main.add.add_student", compact("courses"));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Student::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'course_id' => 'required|exists:courses,course_id',
        ]);

        $lastStudent = Student::orderBy('student_number', 'desc')->first();
        $nextStudentNumber = $lastStudent ? $lastStudent->student_number + 1 : 1;

        Student::create([
            'student_number' => $nextStudentNumber,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show($id)
    {
        return response()->json(Student::with('course')->findOrFail($id));
    }

    public function edit($id)
    {
        $students = Student::findOrFail($id);
        $courses = Course::all();

        return view("main.edit.edit_student", compact("students", "courses"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'course_id' => 'required|exists:courses,course_id',
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student Updated');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success', 'Student Deleted');
    }
}
