<?php
namespace App\Services;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServices implements UserInterface
{

     public function createUser(array $data)
    {
        $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
         return $data;
    }
    public function authenticate(array $credentials)
    {
        if (auth()->attempt($credentials)) {
            return true;
        }
        return false;
    }
    public function logout()
    {
        auth()->logout();
    }
}
