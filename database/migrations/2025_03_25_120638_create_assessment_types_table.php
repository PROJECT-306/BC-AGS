<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessment_types', function (Blueprint $table) {
            $table->id('assessment_type_id'); // Primary key
            $table->string('assessment_name'); // 'Quiz', 'Exam', 'OCR'
            $table->decimal('weight', 5, 2);   // 40.00, 20.00
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessment_types');
    }
};
