<?php

use App\Http\Controllers\{
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
    UserRoleController,
    DashboardController,  
    InstructorController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group routes that require authentication and verification
Route::middleware(["auth", "verified", "throttle:60,1"])->group(function () {

    // Routes for profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resources routes for CRUD operations on various models
    Route::resources([
        "assessment-types"     => AssessmentTypeController::class,
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
    ]);

    // Custom route for fetching student scores
    Route::get('/student-class-records/{student_id}/scores', [StudentClassRecordController::class, 'getStudentScores']);

    // Route for managing chairperson
    Route::get('/chairperson', [InstructorController::class, 'index'])->name('manage.chairperson');
});

require __DIR__.'/auth.php';
