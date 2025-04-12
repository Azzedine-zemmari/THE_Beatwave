<?php

namespace App\Repositories;

use App\Models\EventPurchase;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\EventVisitedInterface;

class EventVisitedRepository implements EventVisitedInterface{
    public function all(){
        return DB::table('event_purchases')
        ->join('users','users.id','=','event_purchases.userId')
        ->join('events','events.eventId','=','event_purchases.eventId')
        ->get();
    }
}