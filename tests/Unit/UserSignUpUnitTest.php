<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSignUpUnitTest extends TestCase
{
    use RefreshDatabase;
    public function testUserCanSignUp()
    {
       //Set up user data
       $userData = [
        'name' => 'Amit Hassan',
        'email' => 'amit@gmail.com',
        'password' => '@Amit23',
    ];

    // Create a new user instance
    $user = new User($userData);

    $this->assertEquals('Amit Hassan', $user->name);
    $this->assertEquals('amit@gmail.com', $user->email);
    $this->assertTrue(Hash::check('@Amit23', $user->password));
    }
}
