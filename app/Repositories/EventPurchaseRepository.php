<?php 

namespace App\Repositories;
use App\Models\EventPurchase;
use App\Repositories\Contracts\EventPurchaseInterface;
use Illuminate\Support\Facades\DB;

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
        // return EventPurchase::with('event.artist')->find($id);
        return DB::table('event_purchases')
        ->join('events_submissions', 'events_submissions.id', '=', 'event_purchases.eventId')
        ->join('events', 'events.eventId', '=', 'events_submissions.eventId')
        ->join('users', 'users.id', '=', 'events_submissions.artistId')
        ->where('event_purchases.id', $id)
        ->select(
            'event_purchases.*',
            'events.nom',
            'events.image',
            'events.place',
            'events.date',
            'events.taketPrice',
            'users.Firstname',
            'users.LastName'
        )
        ->first();
    }
    public function getUserPurchase(int $userId,int $eventId){
        // return EventPurchase::with('event.artist')
        // ->where('userId',$userId)
        // ->where('eventId',$eventId)
        // ->first();
        return DB::table('event_purchases')
        ->join('events_submissions', 'events_submissions.id', '=', 'event_purchases.eventId')
        ->join('events', 'events.eventId', '=', 'events_submissions.eventId')
        ->join('users', 'users.id', '=', 'events_submissions.artistId')
        ->where('event_purchases.userId',$userId)
        ->where('event_purchases.eventId',$eventId)
        ->select(
            'event_purchases.eventId',
            'events.nom',
            'events.image',
            'events.place',
            'events.date',
            'events.taketPrice',
            'users.Firstname',
            'users.LastName'
        )
        ->first();
    }
    public function checkTicket(int $userId,int $eventId){
        return EventPurchase::where('userId',$userId)->where('eventId',$eventId)->first();
    }
    public function revenue(){
        return DB::table('event_purchases')
        ->join('events_submissions', 'events_submissions.eventId', '=', 'event_purchases.eventId')
        ->join('events', 'events.eventId', '=', 'events_submissions.eventId')
        ->where('events.organizerId',auth()->id())
        ->selectRaw('SUM(events."taketPrice") as revenue')
        ->value('revenue');
    }
}