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
            'Firstname'=> 'required',
            'LastName' => 'required',
            'avatar'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
            'facebookLink' => 'nullable',
            'instagramLink' => 'nullable',
            'websiteLink'=> 'nullable',
            'businessMail'=>'nullable|email'
        ]);

        if($validator->fails()){
            throw new ValidationException($validator);
        }

        if($data['avatar'] && $data['avatar']->isValid()){
            $path = $data['avatar']->store('avatars','public');
            $data['avatar'] = $path;
        }
        else{
            unset($data['avatar']);
        }

        return $this->userRepository->update($userId,$data);
    }

    // i create this method to get the user data and show it in the edit profile form
    public function UserData(int $id){
        return $this->userRepository->findById($id);
    }
}