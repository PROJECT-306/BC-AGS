<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('assessment_types')->insert([
            [
                'assessment_name' => 'Quiz',
                'weight' => 40.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'assessment_name' => 'Exam',
                'weight' => 40.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'assessment_name' => 'OCR',
                'weight' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
