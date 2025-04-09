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
    public function getPurchaseWithEvent(int $id){
        return EventPurchase::with('event.artist')->find($id);
    }
    public function getUserPurchase(int $userId,int $eventId){
        return EventPurchase::with('event.artist')
        ->where('userId',$userId)
        ->where('eventId',$eventId)
        ->first();
    }
    public function checkTicket(int $userId,int $eventId){
        return EventPurchase::where('userId',$userId)->where('eventId',$eventId)->first();
    }
}