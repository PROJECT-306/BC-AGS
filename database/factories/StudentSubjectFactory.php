<?php

namespace Database\Factories;

use App\Models\
{
    StudentSubject,
    Student,
    Subject,
    Semester,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentSubject>
 */
class StudentSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = StudentSubject::class;

    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id ?? Student::factory(),
            'subject_id' => Subject::inRandomOrder()->first()->id ?? Subject::factory(),
            'semester_id' => Semester::inRandomOrder()->first()->id ?? Semester::factory(),
        ];
    }
}
