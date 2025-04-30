<?php

namespace Database\Factories;

use App\Models\
{
    ClassSection,
    User,
    AcademicYear,
    Subject,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassSection>
 */
class ClassSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ClassSection::class;

    public function definition()
    {
        return [
            'class_section_name' => $this->faker->words(3, true),
            'user_id' => User::factory(),  // Assumes the User model has a factory
            'academic_year_id' => AcademicYear::query()->inRandomOrder()->value('academic_year_id') ?? AcademicYear::factory()->create()->course_id,
            'subject_id' => Subject::query()->inRandomOrder()->value('subject_id') ?? Subject::factory()->create()->course_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
