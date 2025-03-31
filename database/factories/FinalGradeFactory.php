<?php

namespace Database\Factories;

use App\Models\
{
    FinalGrade,
    Student,
    Subject,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinalGrade>
 */
class FinalGradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = FinalGrade::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()?->id ?? Student::factory(),
            'subject_id' => Subject::inRandomOrder()->first()?->id ?? Subject::factory(),
            'final_grade' => $this->faker->randomFloat(2, 50, 100),
        ];
    }
}
