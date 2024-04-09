<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserSignInUnitTest extends TestCase
{
    use RefreshDatabase;
    public function testUserCanSignIn()
    {
         // Create a user
         $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('@Password123'),
        ]);

        // sign-in request
        $response = $this->post('/store/signin', [
            'email' => 'test@example.com',
            'password' => '@Password123',
        ]);

        //redirected to the dashboard route
        $response->assertRedirect('/dashboard');
    }

    public function testInValidCredential()
    {
        //invalid credentials
        $response = $this->post('/store/signin', [
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword',
        ]);
    
        //redirect
        $response->assertRedirect('/login') 
            ->assertSessionHas('error', 'Invalid credentials..!!');
    }
}
