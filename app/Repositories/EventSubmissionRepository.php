<?php

namespace App\Repositories;

use App\Models\Events_submission;
use App\Repositories\Contracts\EventSubmissionInterface;
use Illuminate\Support\Facades\DB;

class EventSubmissionRepository implements EventSubmissionInterface{
    // to show all the event to the admin
    public function getAll()
    {
        return DB::table('events_submissions')
        ->join('users as organizer','organizer.id','=','events_submissions.organizerId')
        ->join('users as artist','artist.id','=','events_submissions.artistId')
        ->join('events','events.eventId','=','events_submissions.eventId')
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
        'events_submissions.status',
        'events_submissions.id as ID'
        )
        ->get();    
        ;
    }
    public function create(array $data)
    {
        return Events_submission::create([
            'organizerId' => $data['organizerId'],
            'artistId' => $data['artistId'],
            'eventId' => $data['eventId']
        ]);
    }
    public function updateSatatus(int $id, string $status)
    {
        return Events_submission::where('id',$id)->update(['status'=>$status]);
    }

    public function getSubmitedEvents()
    {
        return DB::table('events_submissions')
        ->join('events','events.eventId','=','events_submissions.eventId')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom','events.description','events.image','events_submissions.id as ID','categories.nom as Category')
        ->where('events_submissions.status','accept')
        ->get();
    }
    // to get the event details
    public function getSubmitedEvent(int $id)
    {
        return DB::table('events_submissions')
        ->join('users as organizer','organizer.id','=','events_submissions.organizerId')
        ->join('users as artist','artist.id','=','events_submissions.artistId')
        ->join('events','events.eventId','=','events_submissions.eventId')
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
        'events_submissions.status',
        )
        ->where('events_submissions.status','accept')
        ->where('events_submissions.id',$id)
        ->first();
    }
    
}