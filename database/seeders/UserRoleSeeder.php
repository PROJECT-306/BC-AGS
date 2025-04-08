<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole; // Adjust based on your namespace

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['user_role_number' => 'ROLE-001', 'user_role_name' => 'Admin'],
            ['user_role_number' => 'ROLE-002', 'user_role_name' => 'Instructor'],
            ['user_role_number' => 'ROLE-003', 'user_role_name' => 'Chairperson'],
            ['user_role_number' => 'ROLE-004', 'user_role_name' => 'Dean'],
            ['user_role_number' => 'ROLE-005', 'user_role_name' => 'Super Admin'],
        ];

        foreach ($roles as $role) {
            UserRole::firstOrCreate(
                ['user_role_number' => $role['user_role_number']], // Unique identifier
                ['user_role_name' => $role['user_role_name']]
            );
        }
    }
}
