<?php 

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;


class UserService{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function delete(int $id){
        return $this->userRepository->dropUser($id);
    }
    public function GetUsers(){
        return $this->userRepository->allUsers();
    }
    public function search(string $name){
        return $this->userRepository->UserSearch($name);
    }
}