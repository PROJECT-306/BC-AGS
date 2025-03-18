<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class GradingController extends Controller
{
    public function calculateGrade(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'assignments' => 'required|array',
            'exams' => 'required|array',
        ]);

        $assignmentTotal = 0;
        foreach ($request->assignments as $assignment) {
            $assignmentTotal += $assignment['grade'];
        }
        $examTotal = 0;
        foreach ($request->exams as $exam) {
            $examTotal += $exam['grade'];
        }

        $totalScore = ($assignmentTotal + $examTotal) / (count($request->assignments) + count($request->exams));

        // Save the grade
        Grade::updateOrCreate(
            ['student_id' => $request->student_id, 'course_id' => $request->course_id],
            ['grade' => $totalScore]
        );

        // Provide feedback based on the total score
        $feedback = $this->getFeedback($totalScore);

        return response()->json(['message' => 'Grade calculated successfully!', 'grade' => $totalScore, 'feedback' => $feedback]);
    }

    public function getFeedback($grade)
    {
        $feedback = [];
        if ($grade >= 90) {
            $feedback[] = "Excellent work!";
        } elseif ($grade >= 75) {
            $feedback[] = "Good job!";
        } elseif ($grade >= 60) {
            $feedback[] = "You passed, but there's room for improvement.";
        } else {
            $feedback[] = "You failed. Please review the material and try again.";
        }

        // Additional feedback based on specific assignments or exams can be added here
        return implode(' ', $feedback);
    }

    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('grades.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'assignments' => 'required|array',
            'exams' => 'required|array',
        ]);

        // Calculate the grade based on assignments and exams
        $assignmentTotal = array_sum(array_column($request->assignments, 'grade'));
        $examTotal = array_sum(array_column($request->exams, 'grade'));
        $totalScore = ($assignmentTotal + $examTotal) / (count($request->assignments) + count($request->exams));

        // Save the grade
        Grade::updateOrCreate(
            ['student_id' => $request->student_id, 'course_id' => $request->course_id],
            ['grade' => $totalScore]
        );

        return redirect()->route('grades.index')->with('success', 'Grade submitted successfully!');
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('grades.edit', compact('grade', 'students', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'required|numeric',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update($request->only('student_id', 'course_id', 'grade'));

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully!');
    }
} 