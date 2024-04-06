<?php
namespace App\Interfaces;

interface UserInterface
{

public function createUser(array $data);
public function authenticate(array $credentials);
public function logout();

}