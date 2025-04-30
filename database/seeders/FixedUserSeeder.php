<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixedUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Super Admin
        User::firstOrCreate(
            ['email' => 'ye@gmail.com'],
            [
                'first_name' => 'Ye',
                'last_name' => 'Ey',
                'user_role_id' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );

        //Admin
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Person',
                'user_role_id' => 2,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );

        //Instructor
        User::firstOrCreate(
            ['email' => 'prof@gmail.com'],
            [
                'first_name' => 'Prof',
                'last_name' => 'Person',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );

        //Chairperson
        User::firstOrCreate(
            ['email' => 'chp@gmail.com'],
            [
                'first_name' => 'Program',
                'last_name' => 'Head',
                'user_role_id' => 4,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );

        //Dean
        User::firstOrCreate(
            ['email' => 'dean@gmail.com'],
            [
                'first_name' => 'Dean',
                'last_name' => 'Person',
                'user_role_id' => 5,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
