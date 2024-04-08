<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignUpRequest;
use App\Interfaces\UserInterface;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserInterface $userService)
    {
        $this->userService = $userService;
    }
    /* home page */
    public function index()
    {
        return view('app');
    }
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    /* sign in form */
    public function showSignUpForm()
    {
        return view('pages.signUp');
    }

    /* sign in form data store */
    public function signUpDataStore(UserSignUpRequest $request)
    {
    
        $validatedData = $request->validated();
        $user = $this->userService->createUser($validatedData);
        return redirect()->route('shaw.login.form');
    }

    public function showSignInForm()
    {
        return view('pages.signIn');
    }

    public function signIn(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = $this->userService->authenticate($credentials);
        if($user)
        {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('shaw.login.form')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        $this->userService->logout();
        return redirect()->route('shaw.login.form');
    }

}
