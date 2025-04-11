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
        // Only create if there are assessment types available
        if (!AssessmentType::count()) {
            return [];
        }

        // Get a random instructor (user with Instructor role)
        $instructor = User::whereHas('roles', function($query) {
            $query->where('role_name', 'Instructor');
        })->inRandomOrder()->first();

        return [
            'subject_id' => Subject::inRandomOrder()->first()?->id ?? Subject::factory(),
            'instructor_id' => $instructor?->id ?? User::factory(),
            'assessment_type_id' => AssessmentType::inRandomOrder()->first()?->id,
            'total_items' => $this->faker->numberBetween(5, 50),
            'due_date' => $this->faker->optional()->date(),
        ];
    }
}
