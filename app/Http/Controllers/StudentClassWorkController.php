<?php

namespace App\Http\Controllers;

use App\Models\StudentClassWork;
use App\Models\ClassWork;
use App\Models\Student;
use App\Models\AssessmentType;
use Illuminate\Http\Request;

class StudentClassWorkController extends Controller
{
    // Display all student class works
    public function index()
    {
        $studentClassWork = StudentClassWork::with(['classWork', 'student'])->get(); // Eager loading for relationships
        return view("main.view.view_student_class_work", compact("studentClassWork"));
    }

    // Show the form to create a new student class work
    public function create()
    {
        $students = Student::all();
        $classWorks = ClassWork::with('subject')->get();
        $assessmentTypes = AssessmentType::all();

        // Pass the total items directly to the view
        return view("main.add.add_student_class_work", compact("students", "classWorks", "assessmentTypes"));
    }

    // Store a newly created student class work
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'class_work_id' => 'required|exists:class_works,class_work_id',
            'raw_score' => 'required|integer|min:0',
            'total_items' => 'required|integer|min:1',
        ]);
    
        // Get the assessment type from the class work
        $classWork = ClassWork::findOrFail($request->class_work_id);
        $assessmentType = $classWork->assessmentType;
        
        // Compute the score based on the formula
        $computedScore = ($request->raw_score / $request->total_items) * 50 + 50;
    
        // Create the student class work entry
        $studentClassWork = StudentClassWork::create([
            'student_id' => $request->student_id,
            'class_work_id' => $request->class_work_id,
            'raw_score' => $request->raw_score,
            'total_items' => $request->total_items,
            'computed_score' => $computedScore
        ]);
    
        // Redirect to index with a success message
        return redirect()->route('student-class-works.index')
                         ->with('success', 'Student class work added successfully!');
    }
    
    // Show a specific student class work
    public function show($id)
    {
        $studentClassWork = StudentClassWork::with(['classWork', 'student'])->findOrFail($id); // Eager loading to get related data
        return response()->json($studentClassWork);
    }

    // Update a specific student class work
    public function update(Request $request, $id)
    {
        $request->validate([
            'raw_score' => 'integer|min:0',
            'total_items' => 'integer|min:1',
        ]);

        $studentClassWork = StudentClassWork::findOrFail($id);
        
        // Update the fields that are provided
        $studentClassWork->update($request->only(['raw_score', 'total_items']));

        // Recalculate score if raw_score or total_items changed
        if ($request->has('raw_score') || $request->has('total_items')) {
            $studentClassWork->computed_score = ($studentClassWork->raw_score / $studentClassWork->total_items) * 50 + 50;
            $studentClassWork->save();
        }

        return response()->json([
            'message' => 'Student class work updated successfully!',
            'data' => $studentClassWork
        ]);
    }

    // Delete a specific student class work
    public function destroy($id)
    {
        StudentClassWork::destroy($id);
        return response()->json(['message' => 'Student Class Work deleted']);
    }
}
