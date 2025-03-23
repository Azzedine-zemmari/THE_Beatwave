<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use PDO;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showRegistrationForm(){
        return view('register');
    }

    public function register(Request $request){
        $fields = $request->validate([
            'Firstname' => 'required|max:20',
            'LastName' => 'required|max:20',
            'email' => 'required|unique:users',
            'password' =>' required|min:6'
        ]);

        $user = $this->userRepository->create($fields);
        return redirect('/login');
    }
}
