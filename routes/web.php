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
    DashboardController
};

use App\Http\Controllers\GradingSystem\GradingSystemClassSectionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Role-based Dashboard View
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified', 'throttle:60,1'])->group(function () {
    // User profile routes (accessible to all authenticated users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Final grades route for SuperAdmin
    Route::get('final-grades/view', [FinalGradeController::class, 'view'])
        ->middleware('can:view-any,App\Models\FinalGrade')
        ->name('final-grades.view');

    // SuperAdmin routes
    Route::middleware(['superadmin'])->group(function () {
        Route::resources([
            "user-roles" => UserRoleController::class,
            "courses" => CourseController::class,
            "departments" => DepartmentController::class,
            "academic-years" => AcademicYearController::class,
            "semesters" => SemesterController::class,
        ]);



        // SuperAdmin custom routes
        Route::prefix('superadmin')->group(function () {
            Route::view('/manage-users', 'superadmin.manage-users')->name('superadmin.manage-users');
            Route::view('/manage-grades', 'superadmin.manage-grades')->name('superadmin.manage-grades');
            Route::view('/settings', 'superadmin.settings')->name('superadmin.settings');
            Route::view('/courses', 'superadmin.manage-courses')->name('superadmin.manage-courses');
            Route::view('/academic-periods', 'superadmin.academic-periods')->name('superadmin.academic-periods');
        });
    });

    // Admin routes
    Route::middleware(['admin'])->group(function () {
        Route::resources([
            "user-roles" => UserRoleController::class,
            "courses" => CourseController::class,
            "departments" => DepartmentController::class,
            "academic-years" => AcademicYearController::class,
            "semesters" => SemesterController::class,
        ]);
    });

    // Instructor routes
    Route::middleware(['instructor'])->group(function () {
        Route::resources([
            "class-sections" => ClassSectionController::class,
            "class-works" => ClassWorkController::class,
            "grading-periods" => GradingPeriodController::class,
            "student-class-records" => StudentClassRecordController::class,
            "student-class-works" => StudentClassWorkController::class,
            "student-grades" => StudentGradesController::class,
        ]);

        // Instructor custom routes
        Route::prefix('instructor')->group(function () {
            Route::view('/students', 'instructor.manage-students')->name('instructor.manage-students');
            Route::view('/grades', 'instructor.manage-grades')->name('instructor.manage-grades');
            Route::view('/view-grades', 'instructor.view-grades')->name('instructor.view-grades');
            Route::view('/reports', 'instructor.reports')->name('instructor.reports');
        });

        // Class Section Custom Routes
        Route::get('class-sections/select-section', [ClassSectionController::class, 'redirectToClassSection'])
            ->name('class-sections.redirectToClassSection');
        Route::get('class-sections/options', [ClassSectionController::class, 'redirectToClassSectionOptions'])
            ->name('class-sections.redirectToClassSectionOptions');
        Route::get('class-sections/student-grade', [ClassSectionController::class, 'redirectToClassRecord'])
            ->name('class-sections.redirectToClassRecord');
        Route::get('class-sections/student-scores', [ClassSectionController::class, 'redirectToClassScores'])
            ->name('class-sections.redirectToClassScores');
    });

    // Chairperson routes
    Route::middleware(['chairperson'])->group(function () {
        Route::resources([
            "courses" => CourseController::class,
            "departments" => DepartmentController::class,
            "academic-years" => AcademicYearController::class,
            "semesters" => SemesterController::class,
        ]);
    });

    // Dean routes
    Route::middleware(['dean'])->group(function () {
        Route::resources([
            "courses" => CourseController::class,
            "departments" => DepartmentController::class,
            "academic-years" => AcademicYearController::class,
            "semesters" => SemesterController::class,
        ]);
    });

    // Additional custom route
    Route::get('/student-class-records/{student_id}/scores', [StudentClassRecordController::class, 'getStudentScores']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Class Section Custom Routes
    Route::get('class-sections/select-section', [ClassSectionController::class, 'redirectToClassSection'])
        ->name('class-sections.redirectToClassSection');

    Route::get('class-sections/options', [ClassSectionController::class, 'redirectToClassSectionOptions'])
        ->name('class-sections.redirectToClassSectionOptions');

    Route::get('class-sections/student-grade', [ClassSectionController::class, 'redirectToClassRecord'])
        ->name('class-sections.redirectToClassRecord');

    Route::get('class-sections/student-scores', [ClassSectionController::class, 'redirectToClassScores'])
        ->name('class-sections.redirectToClassScores');

    // RESTful Resources
    Route::resources([
        "assessment-types"       => AssessmentTypeController::class,
        "academic-years"         => AcademicYearController::class,
        "class-sections"         => ClassSectionController::class,
        "class-works"            => ClassWorkController::class,
        "courses"                => CourseController::class,
        "departments"            => DepartmentController::class,
        "grading-periods"        => GradingPeriodController::class,
        "semesters"              => SemesterController::class,
        "student-class-records"  => StudentClassRecordController::class,
        "student-class-works"    => StudentClassWorkController::class,
        "students"               => StudentController::class,
        "student-subjects"       => StudentSubjectController::class,
        "subjects"               => SubjectController::class,
        "user-roles"             => UserRoleController::class,
        "student-grades"         => StudentGradesController::class,
    ]);

    // Users route with authorization check
    Route::get('users', function () {
        return redirect()->route('dashboard')->with('error', 'The users page is only accessible to SuperAdmin and Admin users.');
    })->name('users.index');

    // Additional custom route
    Route::get('/student-class-records/{student_id}/scores', [StudentClassRecordController::class, 'getStudentScores']);

    // Role-based view routes (optional if you link from sidebar)
    Route::prefix('superadmin')->group(function () {
        Route::view('/manage-users', 'superadmin.manage-users')->name('superadmin.manage-users');
        Route::view('/manage-grades', 'superadmin.manage-grades')->name('superadmin.manage-grades');
        Route::view('/settings', 'superadmin.settings')->name('superadmin.settings');
        Route::view('/courses', 'superadmin.manage-courses')->name('superadmin.manage-courses');
        Route::view('/academic-periods', 'superadmin.academic-periods')->name('superadmin.academic-periods');
    });

    Route::prefix('instructor')->group(function () {
        Route::view('/students', 'instructor.manage-students')->name('instructor.manage-students');
        Route::view('/grades', 'instructor.manage-grades')->name('instructor.manage-grades');
        Route::view('/view-grades', 'instructor.view-grades')->name('instructor.view-grades');
        Route::view('/reports', 'instructor.reports')->name('instructor.reports');
    });

    Route::prefix('chairperson')->group(function () {
        Route::view('/manage-instructors', 'chairperson.manage-instructor')->name('chairperson.manage-instructor');
        Route::view('/assign-subjects', 'chairperson.assign-subjects')->name('chairperson.assign-subjects');
        Route::view('/view-grades', 'chairperson.view-grades')->name('chairperson.view-grades');
        Route::view('/reports', 'chairperson.reports')->name('chairperson.reports');
    });

    Route::prefix('dean')->group(function () {
        Route::view('/view-grades', 'dean.view-grades')->name('dean.view-grades');
        Route::view('/reports', 'dean.reports')->name('dean.reports');
    });
});

require __DIR__.'/auth.php';
