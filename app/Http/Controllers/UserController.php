<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function deleteUser(int $id){
        $this->userService->delete($id);
        return redirect()->back();
    }
    public function users(){
        $data = $this->userService->GetUsers();
        return view('admin.UsersTable',compact('data'));
    }
    public function search(Request $request){
        $user = $request->input('name');
        $data = $this->userService->search($user);
        return view('admin.UsersTable',compact('data'));
    }
}

