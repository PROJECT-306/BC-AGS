<?php

namespace Database\Factories;

use App\Models\AssessmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssessmentType>
 */
class AssessmentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = AssessmentType::class;

    public function definition(): array
    {
        return [
            "assessment_name" => $this->faker->unique()->word(),
            "weight" => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}
