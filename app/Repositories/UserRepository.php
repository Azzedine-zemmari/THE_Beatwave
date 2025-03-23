<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{
    public function create(array $data){
        return User::create([
            'Firstname' => $data['Firstname'],
            'LastName' => $data['LastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function findByEmail(string $email)
    {
        return User::where('email',$email)->first();
    } 
}