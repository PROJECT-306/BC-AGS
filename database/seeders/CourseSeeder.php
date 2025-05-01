<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Inserting courses into the ASBME department
        Course::create([
            'course_name' => 'BSHM',
            'department_id' => 2, // ASBME department ID, replace if needed
        ]);
        Course::create([
            'course_name' => 'BSPSYCH',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'AB THEO',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BEED',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BSBA',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BSIT',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BSMLS',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BS PHARMA',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'BSN',
            'department_id' => 2,
        ]);
        Course::create([
            'course_name' => 'DOCTOR OF MEDICINE',
            'department_id' => 2,
        ]);
    }
}


