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

    public function findPurchaseWithEvent(int $id){
        return $this->eventPurchaseRepository->getPurchaseWithEvent($id);
    }
    public function getUserTicket(int $userId,int $eventId){
        return $this->eventPurchaseRepository->getUserPurchase($userId,$eventId);
    }
}