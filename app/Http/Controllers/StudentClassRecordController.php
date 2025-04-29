<?php

namespace App\Http\Controllers;

use App\Models\StudentClassRecord;
use App\Models\Student;
use App\Models\Subject;
use App\Models\GradingPeriod;
use App\Models\StudentClassWork;
use App\Models\FinalGrade;
use Illuminate\Http\Request;

class StudentClassRecordController extends Controller
{
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
            // Find existing record for this student, subject, and grading period
            $record = StudentClassRecord::where([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'grading_period_id' => $request->grading_period_id,
            ])->first();

            // Use existing values if not provided in request
            $quizzes = $request->has('quizzes') ? $request->quizzes : ($record ? $record->quizzes : null);
            $ocr = $request->has('ocr') ? $request->ocr : ($record ? $record->ocr : null);
            $exams = $request->has('exams') ? $request->exams : ($record ? $record->exams : null);

            // Calculate the final grade (40% Quizzes, 20% OCR, 40% Exams)
            $finalGrade = (
                ($quizzes !== null ? $quizzes : 0) * 0.4 +
                ($ocr !== null ? $ocr : 0) * 0.2 +
                ($exams !== null ? $exams : 0) * 0.4
            );

            // Create or update the student class record
            $record = StudentClassRecord::updateOrCreate(
                [
                    'student_id' => $request->student_id,
                    'subject_id' => $request->subject_id,
                    'grading_period_id' => $request->grading_period_id,
                ],
                [
                    'quizzes' => $quizzes,
                    'ocr' => $ocr,
                    'exams' => $exams,
                    'computed_grade' => $finalGrade,
                ]
            );

            // Create or update the final grade record
            $grade = FinalGrade::updateOrCreate(
                [
                    'student_id' => $request->student_id,
                    'subject_id' => $request->subject_id,
                    'grading_period_id' => $request->grading_period_id,
                ],
                [
                    'grade' => $finalGrade,
                ]
            );

            // Update the student's average grade
            $this->updateGPA($request->student_id);

            return redirect()->route('student-class-records.index')
                ->with('success', 'Record and grade created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating record: ' . $e->getMessage());
        }
    }

    private function updateGPA($studentId)
    {
        // Get all grading periods
        $gradingPeriods = GradingPeriod::all();
        
        // Get the student's grades for each grading period
        $totalGrades = 0;
        $count = 0;

        foreach ($gradingPeriods as $period) {
            // Get the student's final grade for this grading period
            $grade = FinalGrade::where('student_id', $studentId)
                ->where('grading_period_id', $period->grading_period_id)
                ->first();

            if ($grade) {
                $totalGrades += $grade->grade;
                $count++;
            }
        }

        // Calculate the average of all grading periods
        $average = $count > 0 ? round($totalGrades / $count, 2) : 0;

        // Create or update the final grade record
        $finalGrade = FinalGrade::updateOrCreate(
            [
                'student_id' => $studentId,
                'subject_id' => $grade->subject_id ?? null,
                'grading_period_id' => null, // This is the final grade, not tied to a specific period
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
