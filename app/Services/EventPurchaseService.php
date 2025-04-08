<?php

namespace App\Services;

use App\Repositories\Contracts\EventPurchaseInterface;

class EventPurchaseService{
    private $eventPurchaseRepository;
    
    public function __construct(EventPurchaseInterface $eventPurchaseRepository)
    {
        $this->eventPurchaseRepository = $eventPurchaseRepository;
    }

    public function storePurchase(array $data){
        return $this->eventPurchaseRepository->create($data);
    }

}