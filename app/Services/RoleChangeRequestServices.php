<?php 

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\RoleChangeRequestInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\RoleChangeApproved;
use App\Mail\RoleChangeRejected;

class RoleChangeRequestServices{

    private $rolechangerequestRepository;
    private $UserRepository;

    public function __construct(RoleChangeRequestInterface $rolechangerequestRepository,UserRepositoryInterface $UserRepository)
    {
        $this->rolechangerequestRepository = $rolechangerequestRepository;
        $this->UserRepository = $UserRepository;
    }

    public function changeRole(array $data){
        return $this->rolechangerequestRepository->create($data);
    }

    public function getAllRequest(){
        return $this->rolechangerequestRepository->getAll();
    }

    public function approveRequest($requestId){
        $requestRole = $this->rolechangerequestRepository->approved($requestId);

        $user = $this->UserRepository->findById($requestRole->userId);

        if($user){
            Mail::to($user->email)->send(new RoleChangeApproved($user));
        }
        return $requestRole;
    }
    public function rejectRequest($requestId){
        $requestRole =  $this->rolechangerequestRepository->rejected($requestId);

        $user = $this->UserRepository->findById($requestRole->userId);

        if($user){
            Mail::to($user->email)->send(new RoleChangeRejected($user));
        }
        return $requestRole;
    }
}