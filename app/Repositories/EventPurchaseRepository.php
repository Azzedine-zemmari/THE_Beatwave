<?php 

namespace App\Repositories;
use App\Models\EventPurchase;
use App\Repositories\Contracts\EventPurchaseInterface;

class EventPurchaseRepository implements EventPurchaseInterface{
    public function create(array $data)
    {
        return EventPurchase::create([
            'userId' => $data['userId'],
            'eventId'=> $data['eventId'],
            'transactionId' => $data['transactionId']
        ]);
    }
}