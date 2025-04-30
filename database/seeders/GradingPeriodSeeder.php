<?php

namespace Database\Seeders;

use App\Models\GradingPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradingPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradingPeriods = ['Prelim', 'Midterm', 'Prefinal', 'Finals'];

        foreach ($gradingPeriods as $period) {
            GradingPeriod::firstOrCreate(['grading_period_name' => $period]);
        }
    }
}
