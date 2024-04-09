<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserSignUpTest extends TestCase
{
    use RefreshDatabase;

    //validation check
    public function testValidationFailsWithEmptyInput()
    {
        $userData = [
            'name' => '', // Empty name
            'email' => '', // Empty email
            'password' => '', // Empty password
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
    public function testValidationFailsWithEmptyName()
    {
        $userData = [
            'name' => '',
            'email' => 'shakil@example.com',
            'password' => 'password123!',
        ];
        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('name');
    }

    public function testValidationFailsWithEmptyEmail()
    {
        $userData = [
            'name' => 'John', 
            'email' => '',
            'password' => 'password123!',
        ];
        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('email');
    }
    public function testValidationFailsWithEmptyPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => '',
        ];
        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }

    public function testValidationFailsWithInvalidEmail()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'not-an-email', // Invalid email
            'password' => 'password123!',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('email');
    }

    public function testValidationFailsWithShortPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => '@sHort2',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }

    public function testValidationFailsWithUpperCaseLetterMissingPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => '@short23',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }
    public function testValidationFailsWithLowerCaseLetterMissingPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => '@SH345T2',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }

    public function testValidationFailsWithSymbolMissingPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => 'SaH345T2',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }
    public function testValidationFailsWithNumberMissingPassword()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => 'SaH345Ta',
        ];

        $response = $this->post('/store/signup', $userData);
        $response->assertSessionHasErrors('password');
    }
    //sign up test
    public function testUserCanSignUp()
    {
        $userData = [
            'name' => 'Shakil Ahammed',
            'email' => 'shakil@example.com',
            'password' => '@Password123',
        ];
        $response = $this->post('/store/signup', $userData);
        $response->assertRedirect('/login');
    
    }
}
