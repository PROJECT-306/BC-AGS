<?php

use App\Http\Controllers\{
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
    StudentGradesController,
    DashboardController,
    InstructorController
};

use App\Http\Controllers\GradingSystem\GradingSystemClassSectionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group routes that require authentication and verification
Route::middleware(['auth', 'verified', 'throttle:60,1'])->group(function () {
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
        "academic-years"       => AcademicYearController::class,
        "semesters"            => SemesterController::class,
        "student-class-records"=> StudentClassRecordController::class,
        "student-class-works"  => StudentClassWorkController::class,
        "students"             => StudentController::class,
        "student-subjects"     => StudentSubjectController::class,
        "subjects"             => SubjectController::class,
        "user-roles"           => UserRoleController::class,
        "student-grades"       => StudentGradesController::class,
        "class-sections"       => ClassSectionController::class,
        "grading-periods"      => GradingPeriodController::class
    ]);

    // Class Sections route
    Route::get('class-sections/redirect', [ClassSectionController::class, 'redirectToClassSection'])->name('class-sections.redirectToClassSection');

    // Final Grades route
    Route::get('final-grades/view', [FinalGradeController::class, 'view'])->name('final-grades.view');

    // Users route with authorization check
    Route::get('users', function () {
        return redirect()->route('dashboard')->with('error', 'The users page is only accessible to SuperAdmin and Admin users.');
    })->name('users.index');

    // Instructor routes
    Route::prefix('instructor')->name('instructor.')->group(function () {
        Route::get('manage-students', [InstructorController::class, 'manageStudents'])->name('manage-students');
        Route::get('manage-grades', [InstructorController::class, 'manageGrades'])->name('manage-grades');
        Route::get('view-grades', [InstructorController::class, 'viewGrades'])->name('view-grades');
        Route::get('reports', [InstructorController::class, 'reports'])->name('reports');
    });

    // Chairperson routes
    Route::prefix('chairperson')->name('chairperson.')->group(function () {
        Route::get('manage-instructor', [InstructorController::class, 'manageInstructor'])->name('manage-instructor');
        Route::get('assign-subjects', [InstructorController::class, 'assignSubjects'])->name('assign-subjects');
        Route::get('view-grades', [InstructorController::class, 'viewGrades'])->name('view-grades');
        Route::get('reports', [InstructorController::class, 'reports'])->name('reports');
    });
});

require __DIR__.'/auth.php';
