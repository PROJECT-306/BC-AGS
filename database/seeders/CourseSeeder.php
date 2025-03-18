<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create(['course_name' => 'Mathematics', 'course_code' => 'MATH101', 'department_id' => 1]);
        Course::create(['course_name' => 'Science', 'course_code' => 'SCI101', 'department_id' => 1]);
        // Add more courses as needed
    }
} 