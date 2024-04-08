<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserSignInTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanSignInWithCorrectCredentials()
    {
        $user = User::factory()->create([
            'email' => 'rahim@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/store/signin', [
            'email' => 'rahim@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
    }
    //credentials check
    public function testUserCannotSignInWithIncorrectCredentials()
    {
        $user = User::factory()->create([
            'email' => 'rahim@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/store/signin', [
            'email' => 'rahim@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login')->assertSessionHas('error');
    }

    // validation check
    public function testSignInValidationFailsWithNoEmail()
    {

        $response = $this->post('/store/signin', [
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Email is required.',
        ]);
    }

    public function testSignInValidationFailsWithInvalidEmailFormat()
    {
        // Using an invalid email format.
        $response = $this->post('/store/signin', [
            'email' => 'not-an-email',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Email must be a valid email address.',
        ]);
    }

    public function testSignInValidationFailsWithNoPassword()
    {
        
        $response = $this->post('/store/signin', [
            'email' => 'rina@example.com',
        ]);

        $response->assertSessionHasErrors([
            'password' => 'Password is required.',
        ]);
    }
}


