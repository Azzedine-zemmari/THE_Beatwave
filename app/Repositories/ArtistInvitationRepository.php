<?php

namespace App\Repositories;

use App\Models\artistInvitation;
use App\Repositories\Contracts\ArtistInvitationInterface;
use Illuminate\Support\Facades\DB;

class ArtistInvitationRepository implements ArtistInvitationInterface{
    public function create(array $data)
    {
        return artistInvitation::create([
            'artistId' => $data['artistId'],
            'organizerId' => $data['organizerId'],
            'eventsId' => $data['eventsId']
        ]);
    }
    public function getAll()
    {
        return DB::table('artist_invitations')
        ->join('users','users.id','=','artist_invitations.organizerId')
        ->join('events','events.eventId','=','artist_invitations.eventsId')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom as Event','events.description','events.place','events.date','categories.nom as EventCategorie','events.taketPrice','users.Firstname as organizer','artist_invitations.status')
        ->get();    
        ;
    }
}