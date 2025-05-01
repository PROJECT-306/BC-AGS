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
            'user_role_number' => 'ROLE-' . str_pad($this->sequence(1, 2, 3, 4, 5), 3, '0', STR_PAD_LEFT),
            'user_role_name' => $this->sequence(
                'SuperAdmin',
                'Admin',
                'Instructor',
                'Chairperson',
                'Dean'
            ),
        ];
    }   
}
