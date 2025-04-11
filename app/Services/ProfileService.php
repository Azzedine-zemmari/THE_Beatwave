<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProfileService{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateProfile(array $data){
        $userId = auth()->id();
        $validator = Validator::make($data,[
            'firstname'=> 'required',
            'LastName' => 'required',
            'avatar'=>'nullable',
            'bio' => 'nullable',
            'facebookLink' => 'nullable',
            'instagramLink' => 'nullable',
            'websiteLink'=> 'nullable',
            'businessMail'=>'nullable|email'
        ]);

        if($validator->fails()){
            throw new ValidationException($validator);
        }

        return $this->userRepository->update($userId,$data);
    }

    // i create this method to get the user data and show it in the edit profile form
    public function UserData(int $id){
        return $this->userRepository->findById($id);
    }
}