<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch totals for dashboard
        $totalStudents = Student::count();
        $totalInstructors = User::where('user_role_id', 'instructor')->count(); 
        $totalCourses = Course::count();
        $totalSubjectsAssigned = Subject::count(); 

        // Return the dashboard view with data
        return view('dashboard', compact(
            'totalStudents',
            'totalInstructors',
            'totalCourses',
            'totalSubjectsAssigned'
        ));
    }
}
