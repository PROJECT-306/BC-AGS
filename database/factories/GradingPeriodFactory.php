<?php

namespace Database\Factories;

use App\Models\GradingPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradingPeriod>
 */
class GradingPeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = GradingPeriod::class;

    public function definition(): array
    {
        return [
            'grading_period_name' => $this->faker->unique()->randomElement([
                'First Term', 'Second Term', 'Midterm', 'Finals'
            ]),
        ];
    }
}
