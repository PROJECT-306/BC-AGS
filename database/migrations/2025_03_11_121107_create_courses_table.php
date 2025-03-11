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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Creates 'id' as Primary Key
            $table->string('course_name')->unique();
            $table->string('course_code')->unique();
            $table->unsignedBigInteger('department_id'); // Foreign Key
            
            // Additional fields
            $table->timestamp('course_date_added')->useCurrent();
            $table->timestamp('course_date_modified')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('course_is_deleted')->default(false);

            // Foreign Key Constraint
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
