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
use Illuminate\Support\Facades\Gate;

class FinalGradeController extends Controller
{
    public function __construct()
    {
        // Middleware is handled by route
    }



    public function index()
    {
        $finalGrades = FinalGrade::with(['student', 'subject', 'semester'])->get();
        
        return view('main.add.list_final_grades', compact('finalGrades'));
    }

    public function view()
    {
        $this->authorize('view-any', FinalGrade::class);

        $finalGrades = FinalGrade::with(['student', 'subject', 'semester'])
            ->whereHas('student')
            ->whereHas('subject')
            ->whereHas('semester')
            ->get();
        
        return view('main.add.list_final_grades', compact('finalGrades'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        return view('main.add.add_final_grade', compact('students', 'subjects', 'semesters'));
    }



    public function calculate(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'semester_id' => 'required|exists:semesters,semester_id',
        ]);

        try {
            // Create or update the final grade
            $finalGrade = FinalGrade::firstOrCreate([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
            ]);

            // Calculate the final grade automatically
            $finalGrade->calculateFinalGrade();
            $finalGrade->save();

            // Update the final grade in the student class record for the Final period
            $gradingPeriods = GradingPeriod::all();
            $finalPeriod = $gradingPeriods->where('grading_period_name', 'Final')->first();
            if ($finalPeriod) {
                StudentClassRecord::updateOrCreate(
                    [
                        'student_id' => $request->student_id,
                        'subject_id' => $request->subject_id,
                        'grading_period_id' => $finalPeriod->grading_period_id,
                    ],
                    [
                        'quizzes' => 0,
                        'ocr' => 0,
                        'exams' => 0,
                        'computed_grade' => $finalGrade->final_grade,
                    ]
                );
            }

            return redirect()->route('final-grades.view')
                ->with('success', 'Final grade calculated and stored successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error calculating final grade: ' . $e->getMessage());
        }
    }

    public function getGrades(Request $request)
    {
        $studentId = $request->student_id;
        $subjectId = $request->subject_id;
        $semesterId = $request->semester_id;

        $requiredPeriods = ['Prelim', 'Midterm', 'Prefinal', 'Final'];
        $grades = [];

        // Get all grading periods
        $gradingPeriods = \App\Models\GradingPeriod::all();

        foreach ($requiredPeriods as $periodName) {
            $period = $gradingPeriods->where('grading_period_name', $periodName)->first();
            if ($period) {
                $record = \App\Models\StudentClassRecord::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->where('grading_period_id', $period->grading_period_id)
                    ->first();

                $grades[strtolower($periodName)] = $record ? $record->computed_grade : '';
            }
        }

        return response()->json($grades);
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'semester_id' => 'required|exists:semesters,semester_id',
        ]);

        try {
            // Create or update the final grade
            $finalGrade = FinalGrade::firstOrCreate([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
            ]);

            // Calculate the final grade automatically
            $finalGrade->calculateFinalGrade();
            $finalGrade->save();

            // Update the final grade in the student class record for the Final period
            $gradingPeriods = GradingPeriod::all();
            $finalPeriod = $gradingPeriods->where('grading_period_name', 'Final')->first();
            if ($finalPeriod) {
                StudentClassRecord::updateOrCreate(
                    [
                        'student_id' => $request->student_id,
                        'subject_id' => $request->subject_id,
                        'grading_period_id' => $finalPeriod->grading_period_id,
                    ],
                    [
                        'quizzes' => 0,
                        'ocr' => 0,
                        'exams' => 0,
                        'computed_grade' => $finalGrade->grade,
                    ]
                );
            }

            return redirect()->route('final-grades.index')
                ->with('success', 'Final grade calculated and stored successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error calculating final grade: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        return response()->json(FinalGrade::findOrFail($id));
    }

    public function getFinalGrade(Request $request)
    {
        $studentId = $request->student_id;
        $subjectId = $request->subject_id;

        $finalGrade = FinalGrade::where('student_id', $studentId)
            ->where('subject_id', $subjectId)
            ->first();

        return response()->json([
            'final_grade' => $finalGrade ? $finalGrade->final_grade : null
        ]);
    }

    public function update(Request $request, $id)
    {
        // No longer updating final_grades or GPA here.
        // This function can be removed or left as a stub if required by routes.
        return response()->json(['message' => 'Grade update endpoint is deprecated. Computed grades are managed in student_class_records only.']);
    }

    public function destroy($id)
    {
        FinalGrade::destroy($id);
        return response()->json(['message' => 'Final grade deleted!']);
    }

    // Removed updateGPA. GPA and final_grades are no longer managed here as computed grades are solely stored in student_class_records.
}
