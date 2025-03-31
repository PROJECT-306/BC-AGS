<?php

namespace Database\Factories;

use App\Models\
{
    Subject,
    User,
    AssessmentType,
    ClassWork,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassWork>
 */
class ClassWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ClassWork::class;

    public function definition(): array
    {
        return [
            'subject_id' => Subject::inRandomOrder()->first()?->id ?? Subject::factory(),
            'instructor_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'assessment_type_id' => AssessmentType::inRandomOrder()->first()?->id ?? AssessmentType::factory(),
            'total_items' => $this->faker->numberBetween(5, 50),
            'due_date' => $this->faker->optional()->date(),
        ];
    }
}
