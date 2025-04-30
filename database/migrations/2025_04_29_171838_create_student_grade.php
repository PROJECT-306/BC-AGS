<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_grade', function (Blueprint $table) {
            $table->id("student_grade_id");
            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("class_section_id");
            $table->unsignedBigInteger("grading_period_id");
            $table->integer("student_grade");
            $table->timestamps();

            $table->foreign("student_id")->references("student_id")->on("students")->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("class_section_id")->references("class_section_id")->on("class_section")->onDelete("cascade")->onUpdate("cascade");
            
            $table->foreign("grading_period_id")->references("grading_period_id")->on("grading_periods")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_grade');
    }
};
