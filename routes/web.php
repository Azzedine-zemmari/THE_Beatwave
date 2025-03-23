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

Route::get('/Home', function () {
    return view('Home');
});

Route::get('/Events',function(){
    return view('Events');
});

Route::get('/Artist',function(){
    return view('Artists');
});
// register
Route::get('/register',[UserController::class,'showRegistrationForm']);
Route::post('/register',[UserController::class,'register'])->name('register');
// login
Route::get('/login',[UserController::class,'showLoginForm'])->name('login');
Route::post('/login',[UserController::class,'login']);
//logout
Route::post('/logout',[UserController::class,'logout'])->name('logout');

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

Route::get('/users',[UserController::class,'index']);