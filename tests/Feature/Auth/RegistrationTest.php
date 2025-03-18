<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'firstname' => 'Test',
            'middlename' => 'User',
            'surname' => 'Example',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'instructor', // Updated role
            'department_id' => 1, // Assuming department_id exists
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_new_super_admin_can_register(): void
    {
        $response = $this->post('/register', [
            'firstname' => 'Super',
            'middlename' => 'Admin',
            'surname' => 'User',
            'email' => 'superadmin@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'superadmin', // Updated role
            'department_id' => 1, // Ensure this ID exists in the departments table
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}
