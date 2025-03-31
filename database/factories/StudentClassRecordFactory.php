<?php

namespace Database\Factories;

use App\Models\
{
    StudentClassRecord,
    Student,
    Subject,
    GradingPeriod,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentClassRecord>
 */
class StudentClassRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = StudentClassRecord::class;
    
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()?->student_id ?? Student::factory(),
            'subject_id' => Subject::inRandomOrder()->first()?->subject_id ?? Subject::factory(),
            'grading_period_id' => GradingPeriod::inRandomOrder()->first()?->grading_period_id ?? GradingPeriod::factory(),
            'quizzes' => $this->faker->randomFloat(2, 0, 100),
            'ocr' => $this->faker->randomFloat(2, 0, 100),
            'exams' => $this->faker->randomFloat(2, 0, 100),
            'computed_grade' => $this->faker->randomFloat(2, 50, 100),
        ];
    }
}
