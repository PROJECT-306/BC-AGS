<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add check constraint to ensure only valid assessment types can be used
        DB::statement('ALTER TABLE assessment_types ADD CONSTRAINT valid_assessment_type 
            CHECK (assessment_name IN ("Quiz", "Exam", "OCR"))');
    }

    public function down(): void
    {
        // Remove check constraint
        DB::statement('ALTER TABLE assessment_types DROP CONSTRAINT IF EXISTS valid_assessment_type');
    }
};
