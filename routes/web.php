<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\RoleChangeRequestController;
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

Route::get('/', function () {
    return view('Home');
});

Route::get('/Events',function(){
    return view('Events');
});

Route::get('/Artist',function(){
    return view('Artists');
});
// register
Route::get('/register',[AuthController::class,'showRegistrationForm']);
Route::post('/register',[AuthController::class,'register'])->name('register');
// login
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);
//logout
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Change user Role
Route::post('/changeRole',[RoleChangeRequestController::class,'changeUserRole'])->name('changeRole');

//admin dashboard 
Route::get('/dashboard',[RoleChangeRequestController::class,'show']);
Route::get('/wait',function(){
    return view('waitingPage');
});
Route::get('/profile',function(){
    return view('profile');
});
Route::get('/EditProfile',function(){
    return view('EditProfile');
});
Route::get('/details',function(){
    return view('EventDetails');
});

Route::get('/users',[AuthController::class,'index']);
Route::get('/auth/google',[GoogleAuthController::class,'redirectToGoogle'])->name("redirect.google");
Route::get('/auth/google/callback',[GoogleAuthController::class,'handleGoogleCallback']);