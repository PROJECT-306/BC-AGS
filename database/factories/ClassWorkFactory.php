<?php

namespace Database\Factories;

use App\Models\
{
    ClassSection,
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

        return [
            'class_work_title' => $this->faker->sentence(3),
            'class_section_id' => ClassSection::inRandomOrder()->first()?->class_section_id ?? ClassSection::factory(),
            'assessment_type_id' => AssessmentType::inRandomOrder()->first()?->assessment_type_id ?? AssessmentType::factory(),
            'total_items' => $this->faker->numberBetween(5, 100),
            'due_date' => $this->faker->optional()->date(),
        ];
    }
}
