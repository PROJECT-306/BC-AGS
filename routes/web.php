<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\StudentController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD routes for grades
    Route::get('/grades', [GradingController::class, 'index'])->name('grades.index');
    Route::get('/grades/create', [GradingController::class, 'create'])->name('grades.create');
    Route::post('/grades', [GradingController::class, 'store'])->name('grades.store');
    Route::get('/grades/{id}/edit', [GradingController::class, 'edit'])->name('grades.edit');
    Route::patch('/grades/{id}', [GradingController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{id}', [GradingController::class, 'destroy'])->name('grades.destroy');
});

Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

require __DIR__.'/auth.php';
