<?php

namespace App\Http\Controllers;

use App\Models\
{
    ClassWork,
    Subject,
    User,
    AssessmentType,
    Semester,
    GradingPeriod,
    Student,
    StudentClassRecord,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassWorkController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    // Display a listing of the class works
    public function index()
    {
        // Eager load relationships with proper constraints
        $classWorks = ClassWork::with([
            'subject' => function($query) {
                $query->select('subject_id', 'subject_name');
            },
            'user' => function($query) {
                $query->select('id', 'first_name', 'last_name');
            },
            'assessmentType' => function($query) {
                $query->select('assessment_type_id', 'assessment_name');
            }
        ])->get();

        return view("main.view.view_class_work", compact("classWorks"));
    }

    // Show the form to create a new class work
    public function create()
    {
        $assessmentTypes = AssessmentType::all();
        $students = Student::all();
        $subjects = Subject::all();
        $instructors = User::where('user_role_id', 3)->get(); // Get all instructors

        return view('main.add.add_class_work', compact(
            'assessmentTypes',
            'students',
            'subjects',
            'instructors'
        ));
    }

    // Store a newly created class work in storage
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'class_work_title' => 'required|string|max:255',
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'instructor_id' => 'required|exists:users,id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);

        try {
            // Create the classwork record
            $classwork = ClassWork::create([
                'subject_id' => $request->subject_id,
                'class_work_title' => $request->class_work_title,
                'assessment_type_id' => $request->assessment_type_id,
                'instructor_id' => $request->instructor_id,
                'total_items' => $request->total_items,
                'due_date' => $request->due_date,
            ]);

            // Get the assessment type name for the success message
            $assessmentType = AssessmentType::find($request->assessment_type_id);
            $successMessage = "Class work '{$request->class_work_title}' for {$assessmentType->assessment_name} has been added successfully!";

            return redirect()->route('class-works.index')->with('success', $successMessage);

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding class work: ' . $e->getMessage());
        }
    }

    // Show the specified class work
    public function show($id)
    {
        return response()->json(ClassWork::findOrFail($id));
    }

    // Show the form to edit the specified class work
    public function edit($id)
    {
        $classWorks = ClassWork::with([
                'subject', 
                'user', 
                'assessmentType',
            ]
        )->findOrFail($id);
        
        // Fetch subjects, instructors with Instructor role ID, and assessment types
        $subjects = Subject::all();
        $instructors = User::where('user_role_id', 3)->get();
        $assessmentTypes = AssessmentType::all();
    
        return view("main.edit.edit_class_work", compact("classWorks", "subjects", "instructors", "assessmentTypes"));
    }

    // Update the specified class work in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'instructor_id' => 'required|exists:users,id',  // Ensure instructor_id exists in the users table
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);
    
        $classWork = ClassWork::findOrFail($id);
        $classWork->update($request->all());
    
        return redirect()->route("class-works.index")->with('success', 'Class Work Updated.');
    }

    // Remove the specified class work from storage
    public function destroy($id)
    {
        ClassWork::destroy($id);
        return redirect()->route('class-works.index')->with('success', 'Class Work Deleted');
    }
}
