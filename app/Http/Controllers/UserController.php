<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'required|unique:users|email',
            'password' =>' required|min:8'
        ]);

        $this->userRepository->create($fields);
        return redirect('/login');
    }
    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = $this->userRepository->findByEmail($data['email']);

        if($user && Hash::check($data['password'],$user->password)){
            Auth::login($user);
            return redirect('/Home');
        }
        else{
            return back()->withErrors(['email'=>'The given credentials does not math our records']);
        }
    }
    public function logout(Request $request){
        // drop the user from the session
        Auth::logout();
        // invalidate the session
        $request->session()->invalidate();
        // regenerate the csrf token
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
