<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\StudentSubject;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalStudents' => Student::count(),
            'totalInstructors' => User::whereHas('user_role', fn ($q) => $q->where('user_role_id', 'Instructor'))->count(),
            'totalCourses' => Course::count(),
            'totalSubjectsAssigned' => StudentSubject::count(),
        ]);
    }
    
}
