<?php 

namespace App\Repositories;

use App\Models\RoleChangeRequest;
use App\Repositories\Contracts\RoleChangeRequestInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleChangeRequestRepository implements RoleChangeRequestInterface{
    public function create(array $data){
        return RoleChangeRequest::create([
            'userId' => Auth::id(),
            'requested_role' => $data['requested_role'],
            'status' => 'pending'
        ]);
    }
    public function getAll()
    {
        return DB::table('role_change_requests')
        ->join('users','users.id','=','role_change_requests.userId')
        ->select('users.Firstname','users.LastName','role_change_requests.*')
        ->get();
    }
}