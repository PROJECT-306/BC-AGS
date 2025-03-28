<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_works', function (Blueprint $table) {
            $table->id('class_work_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('assessment_type_id');
            $table->integer('total_items');
            $table->date('due_date')->nullable();
            $table->timestamps();

            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assessment_type_id')->references('assessment_type_id')->on('assessment_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_works');
    }
};

