<?php 

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\Contracts\EventInterface;
use Illuminate\Support\Facades\DB;

class EventRepository implements EventInterface{
    public function create(array $data)
    {
        return Event::create([
            'nom' => $data['nom'],
            'description' => $data['description'],
            'date' => $data['date'],
            'taketPrice' => $data['taketPrice'],
            'stockeTicket' => $data['stockeTicket'],
            'numberOfPlace' => $data['numberOfPlace'],
            'image' => $data['image'],
            'artistId' => $data['artistId'],
            'categorieId' => $data['categorieId'],
            'place' => $data['place'],
            'organizerId'=> $data['organizerId']
        ]);
    }
    public function findById(int $id)
    {
        return Event::find($id);
    }
    public function update(int $id, array $data)
    {
        $event = $this->findById($id);
        if(!$event){
            return false;
        }
        return $event->update($data);
    }
    // to show the events created by the authenticated organisateur
    public function all(){
        return DB::table('events')
        ->join('users','users.id','=','events.artistId')
        ->join('categories','categories.id','=','events.categorieId')
        ->where('events.organizerId',auth()->id())
        ->whereNull('events.deleted_at')
        ->select('categories.nom as Category',
        'users.Firstname','users.LastName','events.nom','events.description','events.place','events.taketPrice','events.date','events.numberOfPlace','events.eventId')
        ->get();
    }
    public function destroy(int $id)
    {
        $event = $this->findById($id);
        if($event){
            return $event->delete();
        }
        else{
            return false;
        }
    }
    public function EventsCount(){
        return DB::table('events')
        ->where('organizerId',auth()->id())
        ->whereNull('deleted_at')
        ->count();
    }
}