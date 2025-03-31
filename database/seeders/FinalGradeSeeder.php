<?php

namespace Database\Seeders;

use App\Models\
{
    FinalGrade,
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinalGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FinalGrade::factory()->count(10)->create();
    }
}
