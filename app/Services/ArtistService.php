<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class ArtistService{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get(){
        return $this->userRepository->findByRole('artist');
    }

    public function getArtist(int $id){
        return $this->userRepository->findById($id);
    }
    public function searchByname(string $name){
        return $this->userRepository->findByName($name);
    }
}