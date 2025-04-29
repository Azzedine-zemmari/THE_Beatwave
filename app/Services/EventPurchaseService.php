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

    // used in paypal controller
    public function findPurchaseWithEvent(int $id){
        return $this->eventPurchaseRepository->getPurchaseWithEvent($id);
    }
    // to preview ticket
    // ? means userId can be int or null
    public function getUserTicket(?int $userId,int $eventId){
        if(!$userId){
            return null;
        }
        return $this->eventPurchaseRepository->getUserPurchase($userId,$eventId);
        
    }
    // topEvent
    public function ToPthree(){
        return $this->eventPurchaseRepository->topEvent();
    }
    // check if the user buy that event or not 
    public function checkBuy(int $eventId){
        $userId = auth()->id();
        return $this->eventPurchaseRepository->CheckBuy($userId,$eventId);
    }
}