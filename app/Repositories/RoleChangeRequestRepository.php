<?php 

namespace App\Repositories;

use App\Models\User;
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
    public function approved($requestId)
    {
        $request = RoleChangeRequest::findOrFail($requestId);
        $user = User::findOrFail($request->userId);

        // dd($request->requested_role);
        $user->role_id = $request->requested_role;
        $user->save();

        $request->status = 'approved';
        $request->save();

        return $request;
        
    }
    public function rejected($requestId)
    {
        $request = RoleChangeRequest::findOrFail($requestId);
        $request->status  = 'rejected';
        $request->save();
        return $request;
    }
}