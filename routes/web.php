<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware('check.auth')->name('dashboard');;


Route::get('/signup', [UserController::class, 'showSignUpForm'])->name('signup.form');
Route::post('/store/signup', [UserController::class, 'signUpDataStore'])->name('store.signUp.data');

Route::get('/login', [UserController::class, 'showSignInForm'])->name('shaw.login.form');
Route::post('/store/signin', [UserController::class, 'signIn'])->name('signIn');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
