<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthGoogleServices{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function handleGoogleCallBack(){
        $googleUser = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify'=>false])) // ssl fix
        ->stateless() // to avoid sessionException
        ->user();

        $user = $this->userRepository->findByEmail($googleUser->getEmail());

        if(!$user){
            $fullName = $googleUser->getName();
            $nameParts = explode(' ',trim($fullName),2);
            $firstName = $nameParts[0];
            $lastname = $nameParts[1];
            $password = Str::random(16);
            
            $data = [
                'Firstname' => $firstName,
                'LastName' => $lastname,
                'email' => $googleUser->getEmail(),
                'password'=> $password
            ];
            $this->userRepository->create($data);
            $user = $this->userRepository->findByEmail($googleUser->getEmail());
        }
        Auth::login($user);
        return redirect('/');
    }
}