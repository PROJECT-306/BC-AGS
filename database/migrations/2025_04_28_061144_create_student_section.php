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
        Schema::create('student_section', function (Blueprint $table) {
            $table->id("student_section_id");
            $table->unsignedBigInteger("student_subject_id");
            $table->unsignedBigInteger("class_section_id");
            $table->timestamps();

            $table->foreign("student_subject_id")->references("student_subject_id")->on("student_subjects")->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("class_section_id")->references("class_section_id")->on("class_section")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_section');
    }
};
