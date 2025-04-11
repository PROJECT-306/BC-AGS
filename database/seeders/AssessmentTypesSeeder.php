<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssessmentTypesSeeder extends Seeder
{
    public function run(): void
    {
        // First, delete any existing assessment types
        DB::table('assessment_types')->delete();

        // Then insert our three assessment types
        $assessmentTypes = [
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
        ];

        // Insert the assessment types
        foreach ($assessmentTypes as $type) {
            try {
                DB::table('assessment_types')->insert($type);
                echo "Assessment type {$type['assessment_name']} seeded successfully\n";
            } catch (\Exception $e) {
                echo "Error seeding assessment type {$type['assessment_name']}: {$e->getMessage()}\n";
            }
        }
    }
}
