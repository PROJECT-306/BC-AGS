<?php

namespace Database\Seeders;

use App\Models\ClassWork;
use App\Models\AssessmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create class works if there are assessment types available
        if (AssessmentType::count() > 0) {
            ClassWork::factory()->count(10)->create();
        }
    }
}
