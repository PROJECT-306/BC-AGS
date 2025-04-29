<?php

namespace App\Http\Controllers;

use App\Models\FinalGrade;
use App\Models\Student;
use App\Models\StudentClassRecord;
use App\Models\Subject;
use App\Models\GradingPeriod;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalGradeController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 3, 4];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    public function index()
    {
        $finalGrades = FinalGrade::all();
        $students = Student::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        return view('main.add.add_final_grade', compact('finalGrades', 'students', 'subjects', 'semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        try {
            // Get the student's record for this semester
            $record = StudentClassRecord::where('student_id', $request->student_id)
                ->where('subject_id', $request->subject_id)
                ->whereHas('gradingPeriod', function($query) use ($request) {
                    $query->where('semester_id', $request->semester_id);
                })
                ->first();

            if (!$record) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'No record found for this student and semester');
            }

            // Create the final grade using the computed grade from StudentClassRecord
            $grade = FinalGrade::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'semester_id' => $request->semester_id,
                'grade' => $record->computed_grade,
            ]);

            // Update the student's average grade
            $this->updateGPA($request->student_id);

            return redirect()->route('final-grades.index')
                ->with('success', 'Final grade created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating final grade: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        return response()->json(FinalGrade::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $grade = FinalGrade::findOrFail($id);

        $request->validate([
            'grade' => 'numeric|min:0|max:100',
        ]);

        $grade->update($request->only(['grade']));

        // Update the student's average grade
        $this->updateGPA($grade->student_id);

        return response()->json(['message' => 'Grade updated!', 'data' => $grade]);
    }

    public function destroy($id)
    {
        FinalGrade::destroy($id);
        return response()->json(['message' => 'Final grade deleted!']);
    }

    private function updateGPA($studentId)
    {
        // Get all semesters
        $semesters = Semester::all();
        
        // Get the student's grades for each semester
        $totalGrades = 0;
        $count = 0;

        foreach ($semesters as $semester) {
            // Get the student's final grade for this semester
            $grade = FinalGrade::where('student_id', $studentId)
                ->where('semester_id', $semester->semester_id)
                ->first();

            if ($grade) {
                $totalGrades += $grade->grade;
                $count++;
            }
        }

        // Calculate the average of all semesters
        $average = $count > 0 ? round($totalGrades / $count, 2) : 0;

        // Create or update the final grade record
        $finalGrade = FinalGrade::updateOrCreate(
            [
                'student_id' => $studentId,
                'subject_id' => $grade->subject_id ?? null,
                'semester_id' => null, // This is the final grade, not tied to a specific semester
            ],
            [
                'grade' => $average,
            ]
        );

        // Update the student's record with the final grade
        $studentRecord = StudentClassRecord::where('student_id', $studentId)
            ->first();

        if ($studentRecord) {
            $studentRecord->update(['gpa' => $average]);
        }
    }
}
