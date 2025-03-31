<?php

namespace Database\Seeders;

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
        StudentClassWork::factory()->count(10)->create();
    }
}
