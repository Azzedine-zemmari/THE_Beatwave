<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistInvitationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventPurchaseController;
use App\Http\Controllers\EventsSubmissionController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleChangeRequestController;
use App\Http\Controllers\UserController;
use App\Mail\RoleChangeApproved;
use App\Models\Event;
use App\Models\EventPurchase;
use App\Repositories\RoleChangeRequestRepository;
use App\Services\EventSubmissionService;
use App\Services\InscriptionService;
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

Route::get('/', [HomeController::class,'index'])->name('Home');

Route::get('/Events',[EventController::class,'events'])->name('events');
// Route::get('/Event/{id}',[EventController::class,'findEvent']);
Route::get('/Artists',[ArtistController::class,'index'])->name('artists');
// Artist portfolio
Route::get('/ArtistProfile/{id}',[ArtistController::class,'getArtistProfile']);
// search for an artist 
Route::post('/Artist/search',[ArtistController::class,'search'])->name('ArtistSearch');
// register
Route::get('/register',[AuthController::class,'showRegistrationForm'])->name('register');
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
// approve changing user role by admin 
Route::post('/role-change/approve/{id}',[RoleChangeRequestController::class,'approve'])->name('role-change.approve');
Route::post('/role-change/reject/{id}',[RoleChangeRequestController::class,'rejected'])->name('role-change.rejected');

// admin Event submission
Route::get('/admin/EventSubmission',[EventController::class,'showAll']);
// admin accept event to be published
Route::post('/admin/EventSubmission/accept/{id}',[EventController::class,'accept'])->name('acceptEvent');
// admin refuse event to be published
Route::post('/admin/EventSubmission/refuse/{id}',[EventController::class,'refuse'])->name('refuseEvent');
// admin Website dashbiard
Route::get('/admin/Dashboard',[DashboardController::class,'index']);

// admin create categorie
Route::get('/admin/Categorie',[CategoryController::class,"all"]);
// add categorie (interface)
Route::get('/admin/CreateCategorie',[CategoryController::class,"create"]);
// add categorie 
Route::post('/admin/CreateCategorie',[CategoryController::class,"insert"])->name('insertCategorie');
// modifier categorie
Route::get('/admin/modifierCategorie/{id}',[CategoryController::class,'modifier'])->name('modifierCategorie');
// update categorie
Route::post('/admin/updateCategorie',[CategoryController::class,'update'])->name('updateCategorie');
// drop categorie
Route::post('/admin/deletCategorie/{id}',[CategoryController::class,'delete'])->name('deleteCategory');
// admin show all users
Route::get('/admin/users',[UserController::class,'users']);
// admin soft delete a user
Route::post('/admin/ArchiveUser/{id}',[UserController::class,'deleteUser'])->name('archiveUser');
// admin serach for a user
Route::post('/admin/search',[UserController::class,'search'])->name('UserSearch');

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
// Update Event by organisateur
Route::get('/organisateur/edit/{id}',[EventController::class,'edit'])->name('editEvent');
Route::post('/organisateur/update',[EventController::class,'update'])->name('updateEvent');
// Events table for organisateur 
Route::get('/organisateur/Events',[EventController::class
,'index'])->name('showAllEvent');
// delte event by organisateur
Route::post('/organisateur/destroy/{id}',[EventController::class,'delete'])->name('destory');
// get Inscription for authenticated organisateur events
Route::get('/organisateur/inscriptions',[InscriptionController::class,'index'])->name('inscriptions');
// export inscription
Route::get('/organisateur/inscripton/export',[InscriptionController::class,'exportCSV'])->name('ExportCSV');

// profile routes
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/EditProfile/{userId}',[ProfileController::class,'editProfile'])->name('editProfile');
Route::post('/UpdateProfile',[ProfileController::class,'updateProfile'])->name('updateprofile');
// event details
Route::get('/EventDetail/{id}',[EventController::class,'eventDetails'])->name('eventDetails');
// create comment in events
Route::post('/Event/comment',[CommentaireController::class,'comment'])->name('createComment');
// Event search
Route::post('/Event/search',[EventController::class,'search'])->name('event.search');
// Event filtrage
Route::get('/Event/filtrage',[EventController::class,'filtrage'])->name('event.filtrage');

Route::get('/auth/google',[GoogleAuthController::class,'redirectToGoogle'])->name("redirect.google");
Route::get('/auth/google/callback',[GoogleAuthController::class,'handleGoogleCallback']);

// paypal routes
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::post('/process-transaction/{id}', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// tiket preview
Route::view('/ticketPreview','Tiket')->name('tiketPreview');

// preview ticket after buy in it 
Route::get('/TiketShow/{eventId}',[EventPurchaseController::class,'purchaseTicket'])->name('ticketShow');

// download ticket
Route::get('/DownloadTicket/{eventId}',[EventPurchaseController::class,'downloadTicket'])->name('downloadTicket');