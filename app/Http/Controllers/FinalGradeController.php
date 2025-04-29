<?php

namespace App\Http\Controllers;

use App\Models\FinalGrade;
use App\Models\Student;
use App\Models\StudentClassRecord;
use App\Models\Subject;
use App\Models\GradingPeriod;
use App\Models\Semester;
use Illuminate\Http\Request;

class FinalGradeController extends Controller
{
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
            'subject_id' => 'required|exists:subjects,subject_id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        try {
            // Calculate the final grade using all relevant StudentClassRecord entries
            $calculatedGrade = FinalGrade::calculateFinalGrade($request->student_id, $request->subject_id, $request->semester_id);

            if ($calculatedGrade === null) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'No records found for this student, subject, and semester');
            }

            // Create the final grade using the calculated grade
            $grade = FinalGrade::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'semester_id' => $request->semester_id,
                'grade' => $calculatedGrade,
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

        // Optionally, recalculate the grade if student_id, subject_id, or semester_id are present in the request
        $student_id = $request->input('student_id', $grade->student_id);
        $subject_id = $request->input('subject_id', $grade->subject_id);
        $semester_id = $request->input('semester_id', $grade->semester_id);

        $calculatedGrade = FinalGrade::calculateFinalGrade($student_id, $subject_id, $semester_id);
        if ($calculatedGrade !== null) {
            $grade->update([
                'grade' => $calculatedGrade,
                'student_id' => $student_id,
                'subject_id' => $subject_id,
                'semester_id' => $semester_id,
            ]);
        } else {
            // If no records found, keep the previous grade or handle as needed
        }

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

    /**
     * AJAX endpoint to get subjects, semesters, and grade for a student
     */
    public function fetchStudentData(Request $request)
    {
        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');
        $semester_id = $request->input('semester_id');

        $subject = null;
        $semester = null;
        $grade = null;

        // If subject_id and semester_id are provided, use them to fetch subject and semester
        if ($subject_id && $semester_id) {
            $subject = \App\Models\Subject::find($subject_id);
            $semester = \App\Models\Semester::find($semester_id);
            // Calculate the average final grade for the student, subject, and semester
            $grade = \App\Models\FinalGrade::calculateFinalGrade($student_id, $subject_id, $semester_id);
        } else {
            // Fallback: get the first StudentClassRecord for the student
            $record = \App\Models\StudentClassRecord::where('student_id', $student_id)
                ->with(['subject', 'gradingPeriod.semester'])
                ->first();
            if ($record) {
                $subject = $record->subject;
                $semester = $record->gradingPeriod ? $record->gradingPeriod->semester : null;
                // Calculate the average final grade for this subject and semester
                if ($subject && $semester) {
                    $grade = \App\Models\FinalGrade::calculateFinalGrade($student_id, $subject->subject_id, $semester->semester_id);
                } else {
                    $grade = $record->computed_grade;
                }
            }
        }

        return response()->json([
            'subject' => $subject,
            'semester' => $semester,
            'grade' => $grade,
        ]);
    }
}

