<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AuthGoogleServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    private $AuthGoogleServices;
    public function __construct(AuthGoogleServices $AuthGoogleServices)
    {
        $this->AuthGoogleServices = $AuthGoogleServices;
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request){
        return $this->AuthGoogleServices->handleGoogleCallBack();
    }
}
