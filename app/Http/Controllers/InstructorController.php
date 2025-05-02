<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function manageStudents()
    {
        return view('instructor.manage-students');
    }

    public function manageGrades()
    {
        return view('instructor.manage-grades');
    }

    public function viewGrades()
    {
        return view('instructor.view-grades');
    }

    public function reports()
    {
        return view('instructor.reports');
    }

    public function manageInstructor()
    {
        return view('chairperson.manage-instructor');
    }

    public function assignSubjects()
    {
        return view('chairperson.assign-subjects');
    }
}
