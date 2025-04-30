<?php

namespace App\Http\Controllers;

use App\Models\
{
    ClassWork,
    Subject,
    User,
    AssessmentType,
    Student,
    ClassSection,
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassWorkController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3];

        if (Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles)) {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.");
        }
    }

    // Display a listing of the class works
    public function index()
    {
        // Eager load relationships with proper constraints
        $classWorks = ClassWork::with([
            'classSection' => function($query) {
                $query->select('class_section_id', 'class_section_name'); // Update this if you need more fields
            },
            'assessmentType' => function($query) {
                $query->select('assessment_type_id', 'assessment_name');
            },
        ])->get();

        return view("main.view.view_class_work", compact("classWorks"));
    }

    // Show the form to create a new class work
    public function create()
    {
        $assessmentTypes = AssessmentType::all();
        $students = Student::all();
        $classSections = ClassSection::all(); // Get all class sections

        return view('main.add.add_class_work', compact(
            'assessmentTypes',
            'students',
            'classSections'
        ));
    }

    // Store a newly created class work in storage
    public function store(Request $request)
    {
        $request->validate([
            'class_section_id' => 'required|exists:class_section,class_section_id',
            'class_work_title' => 'required|string|max:255',
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);

        try {
            // Create the classwork record
            $classwork = ClassWork::create([
                'class_section_id' => $request->class_section_id,
                'class_work_title' => $request->class_work_title,
                'assessment_type_id' => $request->assessment_type_id,
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
        $classWork = ClassWork::with([
            'classSection',
            'assessmentType',
            'studentClassWorks'
        ])->findOrFail($id);

        return response()->json($classWork);
    }

    // Show the form to edit the specified class work
    public function edit($id)
    {
        $classWork = ClassWork::with([
            'classSection',
            'assessmentType',
            'studentClassWorks',
        ])->findOrFail($id);

        $subjects = Subject::all();
        $assessmentTypes = AssessmentType::all();
        $classSections = ClassSection::all(); // Fetch all class sections

        return view("main.edit.edit_class_work", compact("classWork", "assessmentTypes", "classSections"));
    }

    // Update the specified class work in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_section_id' => 'required|exists:class_section,class_section_id',
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
