<?php

namespace Database\Factories;

use App\Models\
{
    Course,
    Department,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Course::class;
    
    public function definition(): array
    {
        return [
            'course_name' => $this->faker->words(2, true),
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
        ];
    }
}
