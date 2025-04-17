<?php

namespace App\Services;
use App\Repositories\Contracts\CommentaireInterface;

class CommentaireService{
    private $CommentaireRepository;
    public function __construct(CommentaireInterface $commentaire)
    {
        $this->CommentaireRepository = $commentaire; 
    }

    public function create(array $data){
        return $this->CommentaireRepository->create($data);
    }
}