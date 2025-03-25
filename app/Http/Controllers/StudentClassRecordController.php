<?php

namespace App\Http\Controllers;

use App\Models\StudentClassRecord;
use Illuminate\Http\Request;

class StudentClassRecordController extends Controller
{
    public function index()
    {
        return response()->json(StudentClassRecord::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,id',
            'quizzes' => 'required|numeric|min:0|max:100',
            'ocr' => 'required|numeric|min:0|max:100',
            'exams' => 'required|numeric|min:0|max:100',
        ]);

        // Compute final grade
        $finalGrade = ($request->quizzes * 0.4) + ($request->ocr * 0.2) + ($request->exams * 0.4);

        $record = StudentClassRecord::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'quizzes' => $request->quizzes,
            'ocr' => $request->ocr,
            'exams' => $request->exams,
            'final_grade' => $finalGrade,
        ]);

        return response()->json(['message' => 'Student class record created!', 'data' => $record], 201);
    }

    public function show($id)
    {
        return response()->json(StudentClassRecord::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $record = StudentClassRecord::findOrFail($id);

        $request->validate([
            'quizzes' => 'numeric|min:0|max:100',
            'ocr' => 'numeric|min:0|max:100',
            'exams' => 'numeric|min:0|max:100',
        ]);

        $record->update($request->only(['quizzes', 'ocr', 'exams']));

        // Recalculate grade
        $record->final_grade = ($record->quizzes * 0.4) + ($record->ocr * 0.2) + ($record->exams * 0.4);
        $record->save();

        return response()->json(['message' => 'Student class record updated!', 'data' => $record]);
    }

    public function destroy($id)
    {
        StudentClassRecord::destroy($id);
        return response()->json(['message' => 'Student class record deleted!']);
    }
}
