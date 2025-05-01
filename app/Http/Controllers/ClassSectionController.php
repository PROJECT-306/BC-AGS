<?php

namespace App\Http\Controllers;

use App\Models\
{
    ClassSection,
    AcademicYear,
    User,
    Subject,
    StudentGrades,
};

use App\Models\GradingSystem\
{
    GradingSystemStudentGrades,
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Modify the class records with the current changes
class ClassSectionController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $allowedRoles = [1, 4];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    public function index()
    {
        $classSections = ClassSection::with(
            [
                "user",
                "academicYear",
                "subject",
            ]
        )->get();

        return view("main.view.view_class_section", compact("classSections"));
    }

    public function redirectToClassSection()
    {
        $classSections = ClassSection::with(
            [
                "user",
                "academicYear",
            ]
        )->get();

        return view("main.grading_system.instructor.class_section.class_section", compact("classSections"));
    }

    public function redirectToClassSectionOptions(Request $request)
    {
        $classSection = ClassSection::findOrFail($request->query("class_section_id"));
        $subject = Subject::findOrFail($request->query("subject_id"));

        return view("main.grading_system.instructor.class_section.class_section_options", compact("classSection", "subject"));
    }

    public function redirectToClassRecord(Request $request)
    {
        $grades = (new StudentGrades)->finalGrades();

        $classSection = ClassSection::findOrFail($request->query("class_section_id"));
        $subject = Subject::findOrFail($request->query("subject_id"));

        return view("main.grading_system.instructor.class_record.class_record", compact("classSection", "subject", "grades"));
    }

    public function redirectToClassScores(Request $request)
    {
        // Check if class section and subject are found
        $classSection = ClassSection::findOrFail($request->query("class_section_id"));
        $subject = Subject::findOrFail($request->query("subject_id"));

    
        // Return the view with grades, class section, and subject
        return view("main.grading_system.instructor.class_record.class_activity_record", compact("classSection", "subject"));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //This strictly only queries the users with the Instructor Role
        $users = User::userInstructor()->get();
        $academicYears = AcademicYear::all();
        $subjects = Subject::all();

        return view("main.add.add_class_section", compact("users", "academicYears", "subjects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_section_name' => 'required|string|max:255',
            'academic_year_id' => 'required|exists:academic_year,academic_year_id',
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,subject_id',
        ]);

        ClassSection::create($request->all());
        return redirect()->route('class-sections.redirectToClassSection')->with('success', 'Class Section Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classSection = ClassSection::findOrFail($id);
        $users = User::userInstructor()->get();

        $academicYears = AcademicYear::all();
        return view("main.edit.edit_class_section", compact("classSection", "users", "academicYears"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSection $classSection)
    {
        $request->validate([
            'class_section_name' => 'required|string|max:255',
            'academic_year_id' => 'required|exists:academic_year,academic_year_id',
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,subject_id',
        ]);

        $classSection->update($request->all());
        return redirect()->route('class-sections.redirectToClassSection')->with('success', 'Class Section Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClassSection::destroy($id);
        // Optionally, you can use soft deletes instead of hard deletes
        // Will use the soft delete feature once we get a the system stable

        return redirect()->route('class-sections.redirectToClassSection')->with('success', 'Class Section Deleted.');
    }
}

