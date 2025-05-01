<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // First, clear any existing roles
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        UserRole::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Create roles with specific IDs
        $roles = [
            ['user_role_id' => 1, 'user_role_number' => 'ROLE-001', 'user_role_name' => 'SuperAdmin'],
            ['user_role_id' => 2, 'user_role_number' => 'ROLE-002', 'user_role_name' => 'Admin'],
            ['user_role_id' => 3, 'user_role_number' => 'ROLE-003', 'user_role_name' => 'Instructor'],
            ['user_role_id' => 4, 'user_role_number' => 'ROLE-004', 'user_role_name' => 'Chairperson'],
            ['user_role_id' => 5, 'user_role_number' => 'ROLE-005', 'user_role_name' => 'Dean'],
        ];

        foreach ($roles as $role) {
            UserRole::create($role);
        }
    }
}
