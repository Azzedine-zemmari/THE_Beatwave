<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthServices{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data){
        $user = $this->userRepository->create([
            'Firstname' => $data['Firstname'],
            'LastName' => $data['LastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return $user;
    }

}