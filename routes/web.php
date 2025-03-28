<?php

use App\Http\Controllers\
{
    AssessmentTypeController,
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
};
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

    Route::resources(
        [
            "users"                => UserController::class,
            "students"             => StudentController::class,
            "departments"          => DepartmentController::class,
            "courses"              => CourseController::class,
            "semesters"            => SemesterController::class,
            "subjects"             => SubjectController::class,
            "student-subjects"     => StudentSubjectController::class,
            "student-class-records"=> StudentClassRecordController::class,
            "student-class-works"  => StudentClassWorkController::class,
            "grading-periods"      => GradingPeriodController::class,
            "final-grades"         => FinalGradeController::class,
            "assessment-types"     => AssessmentTypeController::class,
            "class-works"          => ClassWorkController::class,
        ]
    );
});

require __DIR__.'/auth.php';
