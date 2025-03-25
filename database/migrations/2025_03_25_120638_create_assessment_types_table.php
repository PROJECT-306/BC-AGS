<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_types', function (Blueprint $table) {
            $table->id('assessment_type_id');
            $table->string('assessment_name')->unique(); // Quizzes, Exams, OCR
            $table->decimal('weight', 5, 2); // 40%, 40%, 20%
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_types');
    }
};
