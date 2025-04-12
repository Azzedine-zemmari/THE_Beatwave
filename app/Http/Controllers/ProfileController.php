<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    private $profileservice;
    public function __construct(ProfileService $profileservice)
    {
        $this->profileservice = $profileservice;
    }

    public function index(){
        return view('profile');
    }
    
    public function editProfile(int $userId){
        $data = $this->profileservice->UserData($userId);
        return view('EditProfile',compact('data'));
    }
    public function updateProfile(Request $request){
        $this->profileservice->updateProfile($request->all());
        return redirect()->route('profile')->with('success','profile updated successfully');
    }
}
