<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create(['department_name' => 'Science', 'department_code' => 'SCI']);
        Department::create(['department_name' => 'Arts', 'department_code' => 'ART']);
        // Add more departments as needed
    }
} 