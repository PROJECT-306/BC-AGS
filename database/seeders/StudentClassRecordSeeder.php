<?php

namespace Database\Seeders;

use App\Models\StudentClassRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentClassRecord::factory()->count(10)->create();
    }
}   
