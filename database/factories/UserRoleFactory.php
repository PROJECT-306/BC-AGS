<?php

namespace Database\Factories;

use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRole>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UserRole::class;

    public function definition(): array
    {
        return [
            'user_role_number' => $this->faker->randomNumber(4),
            'user_role_name' => $this->faker->randomElement(['Super Admin', 'Admin', 'Instructor', 'Dean', 'Chairperson']),
        ];
    }
}
