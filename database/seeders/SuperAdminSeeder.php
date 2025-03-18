<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Super',
            'middlename' => 'Admin',
            'surname' => 'User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'), // Use a secure password
            'role' => 4, // Super Admin role
            'department_id' => 1, // Ensure this ID exists in the departments table
        ]);
    }
} 