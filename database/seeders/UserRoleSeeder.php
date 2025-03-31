<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['user_role_number' => 'ROLE-001', 'user_role_name' => 'Admin'],
            ['user_role_number' => 'ROLE-002', 'user_role_name' => 'Instructor'],
            ['user_role_number' => 'ROLE-003', 'user_role_name' => 'Student'],
        ];

        foreach ($roles as $role) {
            UserRole::firstOrCreate(['user_role_number' => $role['user_role_number']], $role);
        }

        UserRole::factory(5)->create();
    }
}
