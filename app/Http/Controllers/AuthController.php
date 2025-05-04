<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDO;

class AuthController extends Controller
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
            'email' => 'required|email|unique:users',
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
            session()->regenerate();
            session(['user_id' => $user->id]);
            Log::info("ana flogin " . print_r(session()->all(), true));
            switch($user->role_id){
                case '3':
                    return redirect()->route('admin.Dashboard');
                case '2':
                    return redirect()->route('artist.invitation');
                case '1':
                    return redirect()->route('showAllEvent');
                default:
                    return redirect('/');
            }
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
