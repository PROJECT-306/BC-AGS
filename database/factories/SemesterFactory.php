<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Semester::class;
    
    public function definition(): array
    {
        return [
            'semester_name' => $this->faker->randomElement(['First Semester', 'Second Semester', 'Summer Term']),
        ];
    }
}
