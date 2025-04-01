<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleChangeRequestServices;

class RoleChangeRequestController extends Controller
{
    private $rolechangeservice;
    public function __construct(RoleChangeRequestServices $rolechangeservice)
    {
        $this->rolechangeservice = $rolechangeservice;
    
    }
    public function changeUserRole(Request $request){
        $data = $request->validate([
            'requested_role' => 'required|in:artist,organizer'
        ]);
        $this->rolechangeservice->changeRole($data);
        return redirect()->back()->with('success', 'Role change request submitted.');
    }
    public function show(){
        $data = $this->rolechangeservice->getAllRequest();
        return view('admin.changeRoleTable',['data'=>$data]);
    }
    public function approve($id){
        $this->rolechangeservice->approveRequest($id);
        return redirect()->back()->with('success','Role approved successfully');
    }
    public function rejected($id){
        $this->rolechangeservice->rejectRequest($id);
        return redirect()->back()->with('success','Role rejected successfully');
    }
}
