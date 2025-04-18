<?php

namespace App\Services;
use App\Repositories\Contracts\CommentaireInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
class CommentaireService{
    private $CommentaireRepository;
    public function __construct(CommentaireInterface $commentaire)
    {
        $this->CommentaireRepository = $commentaire; 
    }

    public function create(array $data){
        $validator = Validator::make($data,[
            'eventId' => "required",
            'userId' => "required",
            'commentaire' => "required|string"
        ]);
        if($validator->fails()){
            Log::error("Validation error",$validator->errors()->toArray());
            throw new ValidationException($validator);
        }
        return $this->CommentaireRepository->create($data);
    }
}