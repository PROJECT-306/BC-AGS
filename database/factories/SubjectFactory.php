<?php

namespace Database\Factories;

use App\Models\
{
    Subject,
    Course,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'subject_name' => $this->faker->words(3, true),
            'course_id' => Course::query()->inRandomOrder()->value('course_id') ?? Course::factory()->create()->course_id,
        ];
    }
}
