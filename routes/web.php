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

Route::get('/', function () {
    return "hello world";
});

Route::get('/Events',function(){
    return view('Events');
});

Route::get('/Artist',function(){
    return view('Artists');
});

Route::get('/register',[UserController::class,'showRegistrationForm']);
Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('/login',function(){
    return view('login');
})->name('login');

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