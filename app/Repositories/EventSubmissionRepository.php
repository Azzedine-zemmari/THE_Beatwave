<?php

namespace App\Repositories;

use App\Models\Events_submission;
use App\Repositories\Contracts\EventSubmissionInterface;
use Illuminate\Support\Facades\DB;

class EventSubmissionRepository implements EventSubmissionInterface{
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
      'events_submissions.status')
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
        
    }

}