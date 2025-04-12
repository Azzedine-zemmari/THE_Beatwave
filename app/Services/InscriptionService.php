<?php 

namespace App\Services;

use App\Repositories\Contracts\InscriptionInterface;

class InscriptionService{
    private $InscriptionRepository;

    public function __construct(InscriptionInterface $InscriptionRepository)
    {
        $this->InscriptionRepository = $InscriptionRepository;
    }

    public function show(){
        return $this->InscriptionRepository->getInscription();
    }
}