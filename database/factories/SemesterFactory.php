<?php

namespace Database\Factories;

use App\Models\Semester;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Semester::class;
    
    public function definition(): array
    {
        static $usedNames = [];

        $availableNames = array_diff(
            ["First Semester", "Second Semester", "Summer"],
            $usedNames
        );

        if(empty($availableNames))
        {
            throw new Exception("No more unique semester available.");
        }

        $name = $this->faker->randomElement($availableNames);
        $usedNames[] = $name; 

        return [
            'semester_name' => $name,
        ];
    }
}
