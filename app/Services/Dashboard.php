<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class Dashboard{
    private $UserRepository;
    
    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function userCount(){
        return $this->UserRepository->countUsers();
    }
}