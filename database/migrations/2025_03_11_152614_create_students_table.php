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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Creates 'id' as Primary Key
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('surname');
            $table->unsignedBigInteger('course_id'); // Foreign Key
            $table->integer('year_level');
            $table->integer('student_status')->default(0); // Change string to integer with default 0
            $table->timestamp('student_date_added')->useCurrent();
            $table->timestamp('student_date_modified')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('student_is_deleted')->default(false);
        
            // Foreign Key Constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
