<?php 

namespace App\Services;

use App\Repositories\Contracts\RoleChangeRequestInterface;

class RoleChangeRequestServices{
    private $rolechangerequestRepository;
    public function __construct(RoleChangeRequestInterface $rolechangerequestRepository)
    {
        $this->rolechangerequestRepository = $rolechangerequestRepository;
    }
    public function changeRole(array $data){
        return $this->rolechangerequestRepository->create($data);
    }
    public function getAllRequest(){
        return $this->rolechangerequestRepository->getAll();
    }
}