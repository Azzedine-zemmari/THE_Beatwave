<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request){
        $googleUser = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false])) // to handle ssl problem 
        ->stateless() // to avoid session exception problem
        ->user();
        $user = $this->userRepository->findByEmail($googleUser->getEmail());
        if(!$user){
            $fullname = $googleUser->getName();
            $nameParts = explode(' ',trim($fullname),2);
            $firstname = $nameParts[0];
            $lastname = $nameParts[1] ?? '';
            $password = Str::random(16);
            $data = [
                'Firstname' => $firstname ,
                'LastName' => $lastname,
                'email' => $googleUser->getEmail(),
                'password' => $password
            ];
            $this->userRepository->create($data);
        }

        Auth::login($user);
        return redirect('/');
    }
}
