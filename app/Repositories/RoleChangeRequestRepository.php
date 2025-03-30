<?php 

namespace App\Repositories;

use App\Models\RoleChangeRequest;
use App\Repositories\Contracts\RoleChangeRequestInterface;
use Illuminate\Support\Facades\Auth;

class RoleChangeRequestRepository implements RoleChangeRequestInterface{
    public function create(array $data){
        return RoleChangeRequest::create([
            'userId' => Auth::id(),
            'requested_role' => $data['requested_role'],
            'status' => 'pending'
        ]);
    }
}