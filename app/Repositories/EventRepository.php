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
        ->paginate(7);
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
    public function updateStatus(int $id,string $status)
    {
        return Event::where('eventId',$id)->update(['status'=>$status]);
    }
    public function allActive()
    {
        return DB::table('events')
        ->join('users as organizer','organizer.id','events.organizerId')
        ->join('users as artist','artist.id','events.artistId')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom as Event',
        'events.description',
        'events.place','events.date',
        'categories.nom as EventCategorie',
        'events.taketPrice',
        'organizer.Firstname as organizerF',
        'organizer.LastName as organizerL',
        'artist.Firstname as artistF',
        'artist.LastName as artistL',
        'events.status',
        'events.eventId as ID'
        )->whereNotIn('events.status',['pending','desactive'])->paginate(7);
    }
    public function Events()
    {
        return DB::table('events')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom','events.description','events.image','events.eventId as ID','categories.nom as Category','events.deleted_at')
        ->where('events.status','done')
        ->where('events.deleted_at',null)
        ->paginate(6);
    }
    public function eventdetails(int $id)
    {
        return DB::table('events')
        ->join('users as organizer','organizer.id','=','events.organizerId')
        ->join('users as artist','artist.id','=','events.artistId')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom as Event',
        'events.image',
        'events.description',
        'events.place','events.date',
        'categories.nom as EventCategorie',
        'events.taketPrice',
        'organizer.Firstname as organizerF',
        'organizer.LastName as organizerL',
        'artist.Firstname as artistF',
        'artist.LastName as artistL',
        'events.status',
        'events.eventId as id'
        )
        ->where('events.status','done')
        ->where('events.eventId',$id)
        ->first();
    }
    public function getEventPrice(int $id)
    {
        return DB::table('events')
        ->select('events.taketPrice')
        ->where('events.eventId',$id)
        ->first();
    }
    public function countEvent()
    {
        return DB::table('events')->count();
    }
    public function countByCategorie()
    {
        return DB::table('events')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('categories.nom',DB::raw('count(*) as total'))
        ->groupBy('categories.nom')
        ->get();
    }
    public function searchByname(string $name)
    {
        return DB::table('events')
        ->select('events.nom','events.description','events.image','events.eventId as ID','events.deleted_at')
        ->where('nom','like',"%$name%")
        ->where('events.status','done')
        ->where('events.deleted_at',null)
        ->paginate(6);
    }
    public function filterByCategorie(string $category)
    {
        return DB::table('events')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom','events.description','events.image','events.eventId as ID','events.deleted_at')
        ->where('categories.nom',$category)
        ->where('events.status','done')
        ->where('events.deleted_at',null)
        ->paginate(6);
    }
}