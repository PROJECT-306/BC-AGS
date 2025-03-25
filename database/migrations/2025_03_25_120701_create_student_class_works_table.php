<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_class_works', function (Blueprint $table) {
            $table->id('student_class_work_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_work_id');
            $table->integer('raw_score');
            $table->integer('total_items');
            $table->decimal('computed_score', 5, 2); // Formula: (Raw Score / Number of Items) * 50 + 50
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('class_work_id')->references('class_work_id')->on('class_works')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_class_works');
    }
};
