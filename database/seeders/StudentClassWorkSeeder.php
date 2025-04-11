<?php

namespace Database\Seeders;

use App\Models\AssessmentType;
use App\Models\StudentClassWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create student class works if there are assessment types available
        if (AssessmentType::count() > 0) {
            StudentClassWork::factory()->count(10)->create();
        }
    }
}
