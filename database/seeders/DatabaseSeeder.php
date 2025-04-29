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
        // First seed assessment types
        try {
            $this->call(AssessmentTypesSeeder::class);
            echo "Assessment types seeded successfully\n";
        } catch (\Exception $e) {
            echo "Assessment types already exist, continuing...\n";
        }

        // Seed academic years
        try {
            $this->call(AcademicYearSeeder::class);
            echo "Academic years seeded successfully\n";
        } catch (\Exception $e) {
            echo "Academic years already exist, continuing...\n";
        }

        // Seed user roles
        try {
            $this->call(UserRoleSeeder::class);
            echo "User roles seeded successfully\n";
        } catch (\Exception $e) {
            echo "User roles already exist, continuing...\n";
        }

        // Seed users
        try {
            $this->call(UserSeeder::class);
            echo "Users seeded successfully\n";
        } catch (\Exception $e) {
            echo "Users already exist, continuing...\n";
        }

        // Seed departments
        try {
            $this->call(DepartmentSeeder::class);
            echo "Departments seeded successfully\n";
        } catch (\Exception $e) {
            echo "Departments already exist, continuing...\n";
        }

        // Seed courses
        try {
            $this->call(CourseSeeder::class);
            echo "Courses seeded successfully\n";
        } catch (\Exception $e) {
            echo "Courses already exist, continuing...\n";
        }

        // Seed subjects
        try {
            $this->call(SubjectSeeder::class);
            echo "Subjects seeded successfully\n";
        } catch (\Exception $e) {
            echo "Subjects already exist, continuing...\n";
        }

        // Seed students
        try {
            $this->call(StudentSeeder::class);
            echo "Students seeded successfully\n";
        } catch (\Exception $e) {
            echo "Students already exist, continuing...\n";
        }

        // Seed grading periods
        try {
            $this->call(GradingPeriodSeeder::class);
            echo "Grading periods seeded successfully\n";
        } catch (\Exception $e) {
            echo "Grading periods already exist, continuing...\n";
        }

        // Seed semesters
        try {
            $this->call(SemesterSeeder::class);
            echo "Semesters seeded successfully\n";
        } catch (\Exception $e) {
            echo "Semesters already exist, continuing...\n";
        }

        // Seed student subjects
        try {
            $this->call(StudentSubjectSeeder::class);
            echo "Student subjects seeded successfully\n";
        } catch (\Exception $e) {
            echo "Student subjects already exist, continuing...\n";
        }

        // Seed class works
        try {
            $this->call(ClassWorkSeeder::class);
            echo "Class works seeded successfully\n";
        } catch (\Exception $e) {
            echo "Class works already exist, continuing...\n";
        }

        // Seed student class works
        try {
            $this->call(StudentClassWorkSeeder::class);
            echo "Student class works seeded successfully\n";
        } catch (\Exception $e) {
            echo "Student class works already exist, continuing...\n";
        }

        // Seed student class records
        try {
            $this->call(StudentClassRecordSeeder::class);
            echo "Student class records seeded successfully\n";
        } catch (\Exception $e) {
            echo "Student class records already exist, continuing...\n";
        }

        // Seed final grades
        try {
            $this->call(FinalGradeSeeder::class);
            echo "Final grades seeded successfully\n";
        } catch (\Exception $e) {
            echo "Final grades already exist, continuing...\n";
        }

        // Seed fixed users
        try {
            $this->call(FixedUserSeeder::class);
            echo "Fixed users seeded successfully\n";
        } catch (\Exception $e) {
            echo "Fixed users already exist, continuing...\n";
        }
    }
}
