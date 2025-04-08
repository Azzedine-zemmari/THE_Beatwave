<?php

use App\Http\Controllers\ArtistInvitationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventsSubmissionController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RoleChangeRequestController;
use App\Mail\RoleChangeApproved;
use App\Repositories\RoleChangeRequestRepository;
use App\Services\EventSubmissionService;
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

Route::get('/Events',[EventsSubmissionController::class,'events'])->name('events');

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
Route::get('/dashboard',[RoleChangeRequestController::class,'show'])->middleware('role:admin');
// approve changing user role by admin 
Route::post('/role-change/approve/{id}',[RoleChangeRequestController::class,'approve'])->name('role-change.approve');
Route::post('/role-change/reject/{id}',[RoleChangeRequestController::class,'rejected'])->name('role-change.rejected');

// admin Event submission
Route::get('/admin/EventSubmission',[EventsSubmissionController::class,'show'])->middleware('role:admin');
// admin accept event to be published
Route::post('/admin/EventSubmission/accept/{id}',[EventsSubmissionController::class,'accept'])->name('acceptEvent')->middleware('role:admin');
// admin refuse event to be published
Route::post('/admin/EventSubmission/refuse/{id}',[EventsSubmissionController::class,'refuse'])->name('refuseEvent')->middleware('role:admin');

// invitation to events for the artist
Route::get('/artist/Invitation',[ArtistInvitationController::class,'show']);
// accept invitation for event
Route::post('/artist/Invitation/accept/{id}',[ArtistInvitationController::class,'accepte'])->name('accept');
// accept invitation for event
Route::post('/artist/Invitation/refuse/{id}',[ArtistInvitationController::class,'refuse'])->name('refuse');
// Artist schedule for the events
Route::get('/artist/Myschedule',function(){
    return view('artist.Myschedule');
});
// Add Event by organisateur
Route::get('/organisateur/AddEvent',[EventController::class,'showform']);

Route::post('/organisateur/registerEvent',[EventController::class,'store'])->name('registerEvent');

Route::get('/profile',function(){
    return view('profile');
})->name('profile');
Route::get('/EditProfile',function(){
    return view('EditProfile');
});
Route::get('/EventDetail/{id}',[EventsSubmissionController::class,'eventDetails'])->name('eventDetails');

Route::get('/auth/google',[GoogleAuthController::class,'redirectToGoogle'])->name("redirect.google");
Route::get('/auth/google/callback',[GoogleAuthController::class,'handleGoogleCallback']);


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::post('/process-transaction/{id}', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');