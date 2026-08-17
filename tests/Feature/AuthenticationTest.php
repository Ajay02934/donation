<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register_with_profile_details(): void
    {
        $response = $this->post('/register', [
            'name' => 'Asha Patel',
            'email' => 'asha@example.com',
            'mobile' => '+1 555 010 1234',
            'address' => '10 Main Street',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => '1',
        ]);

        $response->assertRedirect('/account');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'asha@example.com', 'mobile' => '+1 555 010 1234']);
    }

    public function test_registration_rejects_an_existing_email_address(): void
    {
        User::factory()->create(['email' => 'asha@example.com']);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Asha Patel',
            'email' => 'asha@example.com',
            'mobile' => '+1 555 010 1234',
            'address' => '10 Main Street',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => '1',
        ]);

        $response->assertRedirect('/register')->assertSessionHasErrors('email');
    }
}
