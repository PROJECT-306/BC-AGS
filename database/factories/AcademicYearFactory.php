<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicYear>
 */
class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = AcademicYear::class;

    public function definition(): array
    {
        static $startingYear = 2000;

        $data = [   
            'year_start' => $startingYear,
            'year_end' => $startingYear + 1,
        ];

        $startingYear++;

        return $data;
    }
}
