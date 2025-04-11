<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            ['semester_name' => 'First Semester'],
            ['semester_name' => 'Second Semester'],
            ['semester_name' => 'Summer'],
        ];

        foreach ($semesters as $semester) {
            try {
                DB::table('semesters')->insert([
                    'semester_name' => $semester['semester_name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } catch (\Exception $e) {
                // If semester already exists, continue
                if (str_contains($e->getMessage(), 'duplicate entry')) {
                    continue;
                }
                throw $e;
            }
        }
    }
}
