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

            // Do not insert into FinalGrade; just confirm the record exists and return success
            return redirect()->route('final-grades.index')
                ->with('success', 'Student class record found. No final grade inserted, as computed grade is already stored.');

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
