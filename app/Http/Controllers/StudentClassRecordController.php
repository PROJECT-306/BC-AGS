<?php

namespace App\Http\Controllers;

use App\Models\StudentClassRecord;
use App\Models\Student;
use App\Models\Subject;
use App\Models\GradingPeriod;
use App\Models\StudentClassWork;
use App\Models\FinalGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentClassRecordController extends Controller
{
    public function __construct()
    {
        $allowedRoles = [1, 4];

        if(Auth::check() && !in_array(Auth::user()->user_role_id, $allowedRoles))
        {
            redirect()->route('dashboard')->with("error", "You don't have permission to access this page.")->send();
        }
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $gradingPeriods = GradingPeriod::all();

        return view("main.add.add_student_class_record", compact("students", "subjects", "gradingPeriods"));
    }

    public function getStudentScores(Request $request)
    {
        $studentId = $request->student_id;
        
        // Get all class works for the student with computed scores
        $studentClassWorks = StudentClassWork::with('classWork.assessmentType')
            ->where('student_id', $studentId)
            ->get();

        // Initialize scores and counters
        $scores = [
            'quizzes' => 0,
            'ocr' => 0,
            'exams' => 0,
            'final_grade' => 0
        ];
        $counters = [
            'quizzes' => 0,
            'ocr' => 0,
            'exams' => 0
        ];

        // Process each class work
        foreach ($studentClassWorks as $studentClassWork) {
            if (!$studentClassWork->classWork || !$studentClassWork->classWork->assessmentType) {
                continue;
            }

            $assessmentType = $studentClassWork->classWork->assessmentType->assessment_name;
            $computedScore = $studentClassWork->computed_score;

            if ($computedScore !== null) {
                switch ($assessmentType) {
                    case 'Quiz':
                        $scores['quizzes'] += $computedScore;
                        $counters['quizzes']++;
                        break;
                    case 'OCR':
                        $scores['ocr'] += $computedScore;
                        $counters['ocr']++;
                        break;
                    case 'Exam':
                        $scores['exams'] += $computedScore;
                        $counters['exams']++;
                        break;
                }
            }
        }

        // Calculate averages
        foreach ($counters as $type => $count) {
            if ($count > 0) {
                $scores[$type] = round($scores[$type] / $count, 2);
            }
        }

        return response()->json($scores);
    }

    public function index()
    {
        $studentClassRecord = StudentClassRecord::all();

        return view("main.view.view_student_class_record", compact("studentClassRecord"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'grading_period_id' => 'required|exists:grading_periods,grading_period_id',
            'quizzes' => 'required|numeric|min:0|max:100',
            'ocr' => 'required|numeric|min:0|max:100',
            'exams' => 'required|numeric|min:0|max:100',
        ]);

        try {
            // Calculate the final grade (40% Quizzes, 20% OCR, 40% Exams)
            $finalGrade = (
                ($request->quizzes * 0.4) +
                ($request->ocr * 0.2) +
                ($request->exams * 0.4)
            );

            // Create or update the student class record
            $record = StudentClassRecord::updateOrCreate(
                [
                    'student_id' => $request->student_id,
                    'subject_id' => $request->subject_id,
                    'grading_period_id' => $request->grading_period_id,
                ],
                [
                    'quizzes' => $request->quizzes,
                    'ocr' => $request->ocr,
                    'exams' => $request->exams,
                    'computed_grade' => $finalGrade,
                ]
            );

            // Note: No longer updating/inserting into final_grades table.
            // Only updating student_class_records.
            return redirect()->route('student-class-records.index')
                ->with('success', 'Record and computed grade stored successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating record: ' . $e->getMessage());
        }
    }

    // Removed updateGPA. GPA and final_grades are no longer managed here as computed grades are solely stored in student_class_records.

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
        $request->computed_grade = ($record->quizzes * 0.4) + ($record->ocr * 0.2) + ($record->exams * 0.4);
        $record->update(['computed_grade' => $request->computed_grade]);

        return response()->json(['message' => 'Student class record updated!', 'data' => $record]);
    }

    public function destroy($id)
    {
        StudentClassRecord::destroy($id);
        return response()->json(['message' => 'Student class record deleted!']);
    }
}
