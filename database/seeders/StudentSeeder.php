<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Ensure that course_id exists in the courses table
        Student::create(['firstname' => 'John', 'middlename' => 'A', 'surname' => 'Doe', 'course_id' => 1, 'year_level' => 1]);
        Student::create(['firstname' => 'Jane', 'middlename' => 'B', 'surname' => 'Smith', 'course_id' => 1, 'year_level' => 2]);
        // Add more students as needed
    }
} 