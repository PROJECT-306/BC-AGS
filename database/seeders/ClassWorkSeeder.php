<?php

namespace Database\Seeders;

use App\Models\ClassWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassWork::factory()->count(10)->create();
    }
}
