<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                AssessmentTypeSeeder::class,
                ClassWorkSeeder::class,
                CourseSeeder::class,
                DepartmentSeeder::class,
                FinalGradeSeeder::class,
                FixedUserSeeder::class,
                GradingPeriodSeeder::class,
                SemesterSeeder::class,
                StudentClassRecordSeeder::class,
                StudentClassWorkSeeder::class,
                StudentSeeder::class,
                StudentSubjectSeeder::class,
                SubjectSeeder::class,
                UserRoleSeeder::class,
                UserSeeder::class,
            ]
        );
    }
}
