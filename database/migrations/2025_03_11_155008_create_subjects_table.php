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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id(); // subject_id (Primary Key)
            $table->string('subject_code')->unique();
            $table->text('subject_description')->nullable();
            $table->integer('subject_units');
            $table->integer('subject_status')->default(0); // 0 = Active, 1 = Inactive
            
            $table->unsignedBigInteger('course_id'); // Foreign Key
            
            // Foreign Key Constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
    
            // Custom timestamps
            $table->timestamp('subject_date_added')->useCurrent();
            $table->timestamp('subject_date_modified')->useCurrent()->useCurrentOnUpdate();
            
            $table->boolean('subject_is_deleted')->default(false); // Soft delete flag
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
