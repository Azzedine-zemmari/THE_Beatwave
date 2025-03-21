<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthServices;
use PDO;

class UserController extends Controller
{
    private $auth;
    public function __construct(AuthServices $auth)
    {
        $this->auth = $auth;
    }

    public function register(Request $request){
        $fields = $request->validate([
            'Firstname' => 'required|max:50',
            'LastName' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $result = $this->auth->register($fields);
        return response()->json($result,201);
    }
}
