<?php

namespace Database\Factories;

use App\Models\
{
    StudentClassWork,
    Student,
    ClassWork,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentClassWork>
 */
class StudentClassWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = StudentClassWork::class;

    public function definition(): array
    {
        $totalItems = $this->faker->numberBetween(10, 100);
        $rawScore = $this->faker->numberBetween(0, $totalItems);
        $computedScore = round(($rawScore / $totalItems) * 100, 2);

        return [
            'student_id' => Student::inRandomOrder()->first()?->student_id ?? Student::factory(),
            'class_work_id' => ClassWork::inRandomOrder()->first()?->class_work_id ?? ClassWork::factory(),
            'raw_score' => $rawScore,
            'total_items' => $totalItems,
            'computed_score' => $computedScore,
        ];
    }
}
