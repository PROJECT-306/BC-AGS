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
    public function index()
    {
        $classWorks = ClassWork::with(
            [
                "subject",
                "user",
                "assessmentType",
            ]
        )->get();

        return view("main.view.view_class_work", compact("classWorks"));
    }

    public function create()
    {
        $subjects = Subject::all();
        $instructors = User::where("user_role_id", 2)->get();
        $assessmentTypes = AssessmentType::all();

        return view("main.add.add_class_work", compact("subjects", "instructors", "assessmentTypes"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'instructor_id' => 'required|exists:users,id',
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);

        $classWork = ClassWork::create($request->all());
        return redirect()->route('class-works.index')->with('success', 'Class Work Added');
    }

    public function show($id)
    {
        return response()->json(ClassWork::findOrFail($id));
    }

    public function edit($id)
    {
        $classWorks = ClassWork::with([
                'subject', 
                'user', 
                'assessmentType',
            ]
        )->findOrFail($id);
        $subjects = Subject::all();
        $instructors = User::all();
        $assessmentTypes = AssessmentType::all();
    
        return view("main.edit.edit_class_work", compact("classWorks", "subjects", "instructors", "assessmentTypes"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'instructor_id' => 'required|exists:users,id',
            'assessment_type_id' => 'required|exists:assessment_types,assessment_type_id',
            'total_items' => 'required|integer|min:1',
            'due_date' => 'required|date',
        ]);
    
        $classWork = ClassWork::findOrFail($id);
        $classWork->update($request->all());
    
        return redirect()->route("class-works.index")->with('success', 'Class Work Updated.');
    }


    public function destroy($id)
    {
        ClassWork::destroy($id);
        return redirect()->route('class-works.index')->with('success', 'Class Work Deleted');
    }
}
