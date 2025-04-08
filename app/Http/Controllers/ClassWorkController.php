<?php

namespace App\Http\Controllers;

use App\Models\
{
    ClassWork,
    Subject,
    User,
    AssessmentType,
};
use Illuminate\Http\Request;

class ClassWorkController extends Controller
{
    // Display a listing of the class works
    public function index()
    {
        $classWorks = ClassWork::with(
            [
                "subject",
                "user", // Relationship is already filtered to Instructor in the model
                "assessmentType",
            ]
        )->get();

        return view("main.view.view_class_work", compact("classWorks"));
    }

    // Show the form to create a new class work
    public function create()
    {
        // Fetch subjects and assessment types as before
        $subjects = Subject::all();
        // Fetch only users who are instructors (user_role_id = 21)
        $instructors = User::where('user_role_id', 21)->get();
        $assessmentTypes = AssessmentType::all();

        return view("main.add.add_class_work", compact("subjects", "instructors", "assessmentTypes"));
    }

    // Store a newly created class work in storage
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'instructor_id' => 'required|exists:users,id',  // Ensure instructor_id exists in the users table
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);

        // Create the class work entry
        $classWork = ClassWork::create($request->all());
        return redirect()->route('class-works.index')->with('success', 'Class Work Added');
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
        
        // Fetch subjects, instructors (user_role_id = 21), and assessment types
        $subjects = Subject::all();
        $instructors = User::where('user_role_id', 21)->get(); // Fetch only instructors
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
