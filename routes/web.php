<?php

use App\Http\Controllers\
{
    AssessmentTypeController,
    AcademicYearController,
    ClassSectionController,
    ClassWorkController,
    Controller,
    CourseController,
    DepartmentController,
    FinalGradeController,
    GradingPeriodController,
    ProfileController,
    SemesterController,
    StudentClassRecordController,
    StudentClassWorkController,
    StudentController,
    StudentSubjectController,
    SubjectController,
    UserController,
    UserRoleController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified", "throttle:60,1"])->group(function () 
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Update accordingly when adding a new table
    //Route::resources automatically assigns the commands(index, create, store, show, edit, update, and destroy)
    Route::resources(
        [
            "assessment-types"     => AssessmentTypeController::class,
            "academic-years"       => AcademicYearController::class,
            "class-sections"       => ClassSectionController::class,
            "class-works"          => ClassWorkController::class,
            "courses"              => CourseController::class,
            "departments"          => DepartmentController::class,
            "final-grades"         => FinalGradeController::class,
            "grading-periods"      => GradingPeriodController::class,
            "semesters"            => SemesterController::class,
            "student-class-records"=> StudentClassRecordController::class,
            "student-class-works"  => StudentClassWorkController::class,
            "students"             => StudentController::class,
            "student-subjects"     => StudentSubjectController::class,
            "subjects"             => SubjectController::class,
            "users"                => UserController::class,
            "user-roles"           => UserRoleController::class,
        ]
    );

    //Using a Custom Function in the controller outside the range of the resources function must be put down here
    //Organize Accordingly
    Route::get('/student-class-records/{student_id}/scores', [StudentClassRecordController::class, 'getStudentScores']);
});

require __DIR__.'/auth.php';
