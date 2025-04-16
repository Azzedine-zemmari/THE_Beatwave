<?php

namespace App\Repositories;

use App\Models\EventPurchase;
use App\Repositories\Contracts\InscriptionInterface;
use Illuminate\Support\Facades\DB;


class InscriptionRepository implements InscriptionInterface{
    public function getInscription(){
        return DB::table('event_purchases')
        ->join('users as attendee', 'attendee.id', '=', 'event_purchases.userId')
        ->join('events', 'events.eventId', '=', 'event_purchases.eventId')
        ->join('users as organizer', 'organizer.id', '=', 'events.organizerId')
        ->where('events.organizerId', auth()->id())
        ->select('attendee.Firstname', 'attendee.LastName', 'events.nom', 'event_purchases.transactionId', 'events.taketPrice')
        ->get();
    }
    public function countInscription()
    {
        return DB::table('event_purchases')
        ->join('events', 'events.eventId', '=', 'event_purchases.eventId')
        ->where('events.organizerId',auth()->id())
        ->count();
    }
}