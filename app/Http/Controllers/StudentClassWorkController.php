<?php

namespace App\Http\Controllers;

use App\Models\StudentClassWork;
use Illuminate\Http\Request;

class StudentClassWorkController extends Controller
{
    public function index()
    {
        $studentClassWork = StudentClassWork::all();

        return view("main.view.view_student_class_work", compact("studentClassWork"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,id',
            'assessment_type_id' => 'required|exists:assessment_types,id',
            'raw_score' => 'required|integer|min:0',
            'total_items' => 'required|integer|min:1',
        ]);

        // Compute the score
        $computedScore = ($request->raw_score / $request->total_items) * 50 + 50;

        // Create record with computed score
        $studentClassWork = StudentClassWork::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'assessment_type_id' => $request->assessment_type_id,
            'raw_score' => $request->raw_score,
            'total_items' => $request->total_items,
            'computed_score' => $computedScore
        ]);

        return response()->json(['message' => 'Student class work recorded successfully!', 'data' => $studentClassWork], 201);
    }

    public function show($id)
    {
        return response()->json(StudentClassWork::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'raw_score' => 'integer|min:0',
            'total_items' => 'integer|min:1',
        ]);

        $studentClassWork = StudentClassWork::findOrFail($id);
        
        // Update fields if provided
        $studentClassWork->update($request->only(['raw_score', 'total_items']));

        // Recalculate score if raw_score or total_items changed
        if ($request->has('raw_score') || $request->has('total_items')) {
            $studentClassWork->computed_score = ($studentClassWork->raw_score / $studentClassWork->total_items) * 50 + 50;
            $studentClassWork->save();
        }

        return response()->json(['message' => 'Student class work updated successfully!', 'data' => $studentClassWork]);
    }

    public function destroy($id)
    {
        StudentClassWork::destroy($id);
        return response()->json(['message' => 'Student Class Work deleted']);
    }
}
