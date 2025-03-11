<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {
        $departments = Department::all(); 
        $courses = Course::with('department')->get();
        $students = Student::with('course')->get();
        $subjects = Subject::with('course')->get(); // Fetch all subjects with course info

        return view('dashboard', [
            'user' => Auth::user(),
            'departments' => $departments,
            'courses' => $courses,
            'subjects' => $subjects,
            'students' => $students,
        ]);
    }
}
