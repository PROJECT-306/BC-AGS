<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // First, clear any existing roles
        DB::table('user_roles')->delete();

        $roles = [
            [
                'user_role_id' => 1,
                'user_role_number' => 'ROLE-001',
                'user_role_name' => 'SuperAdmin',
            ],
            [
                'user_role_id' => 2,
                'user_role_number' => 'ROLE-002',
                'user_role_name' => 'Admin',
            ],
            [
                'user_role_id' => 3,
                'user_role_number' => 'ROLE-003',
                'user_role_name' => 'Instructor',
            ],
            [
                'user_role_id' => 4,
                'user_role_number' => 'ROLE-004',
                'user_role_name' => 'Chairperson',
            ],
            [
                'user_role_id' => 5,
                'user_role_number' => 'ROLE-005',
                'user_role_name' => 'Dean',
            ],
        ];

        foreach ($roles as $role) {
            try {
                DB::table('user_roles')->insert([
                    'user_role_id' => $role['user_role_id'],
                    'user_role_number' => $role['user_role_number'],
                    'user_role_name' => $role['user_role_name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                echo "Role {$role['user_role_name']} seeded successfully\n";
            } catch (\Exception $e) {
                echo "Error seeding role {$role['user_role_name']}: {$e->getMessage()}\n";
            }
        }
    }
}
