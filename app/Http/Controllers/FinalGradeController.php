<?php

namespace App\Http\Controllers;

use App\Models\FinalGrade;
use Illuminate\Http\Request;

class FinalGradeController extends Controller
{
    public function index()
    {
        $finalGrade = FinalGrade::all();

        return view("main.view.view_final_grade", compact("finalGrade"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,id',
            'prelim' => 'required|numeric|min:0|max:100',
            'midterm' => 'required|numeric|min:0|max:100',
            'pre_final' => 'required|numeric|min:0|max:100',
            'final' => 'required|numeric|min:0|max:100',
        ]);

        // Compute final grade
        $finalGrade = ($request->prelim + $request->midterm + $request->pre_final + $request->final) / 4;

        $grade = FinalGrade::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'prelim' => $request->prelim,
            'midterm' => $request->midterm,
            'pre_final' => $request->pre_final,
            'final' => $request->final,
            'final_grade' => $finalGrade,
        ]);

        return response()->json(['message' => 'Final grade recorded!', 'data' => $grade], 201);
    }

    public function show($id)
    {
        return response()->json(FinalGrade::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $grade = FinalGrade::findOrFail($id);

        $request->validate([
            'prelim' => 'numeric|min:0|max:100',
            'midterm' => 'numeric|min:0|max:100',
            'pre_final' => 'numeric|min:0|max:100',
            'final' => 'numeric|min:0|max:100',
        ]);

        $grade->update($request->only(['prelim', 'midterm', 'pre_final', 'final']));

        // Recalculate final grade
        $grade->final_grade = ($grade->prelim + $grade->midterm + $grade->pre_final + $grade->final) / 4;
        $grade->save();

        return response()->json(['message' => 'Final grade updated!', 'data' => $grade]);
    }

    public function destroy($id)
    {
        FinalGrade::destroy($id);
        return response()->json(['message' => 'Final grade deleted!']);
    }
}
