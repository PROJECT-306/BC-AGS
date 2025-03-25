<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_class_records', function (Blueprint $table) {
            $table->id('student_class_record_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('grading_period_id');
            $table->decimal('quizzes', 5, 2);
            $table->decimal('ocr', 5, 2);
            $table->decimal('exams', 5, 2);
            $table->decimal('computed_grade', 5, 2); // Formula: (Quizzes * 0.4) + (OCR * 0.2) + (Exams * 0.4)
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->foreign('grading_period_id')->references('grading_period_id')->on('grading_periods')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_class_records');
    }
};

