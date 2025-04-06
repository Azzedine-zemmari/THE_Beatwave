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
        ->join('users as organizer','organizer.id','=','artist_invitations.organizerId')
        ->join('users as artist','artist.id','=','artist_invitations.artistId')
        ->join('events','events.eventId','=','artist_invitations.eventsId')
        ->join('categories','categories.id','=','events.categorieId')
        ->select('events.nom as Event','events.description',
        'events.place','events.date',
        'categories.nom as EventCategorie',
        'events.taketPrice',
        'organizer.Firstname as organizer',
        'artist_invitations.status',
        'artist_invitations.id as ID')
        ->where('artist_invitations.artistId',auth()->id())
        ->get();    
        
    }
    // public function updateStatus(int $invitationId, string $status)
    // {
    //     return artistInvitation::where('id',$invitationId)->update([
    //         'status' => $status
    //     ]);
    // }
    public function acceptInvitation(int $id)
    {
        return artistInvitation::where('id',$id)->update(['status'=>'accept']);
    }
    public function refuseInvitation(int $id)
    {
        return artistInvitation::where('id',$id)->update(['status'=>'refuse']);
    }
    public function availability(){
        return DB::table('artist_invitations')
        ->join('events','events.eventId','=','artist_invitations.eventsId')
        ->select('events.nom as Event','events.date')
        ->where('artist_invitations.status','accept')
        ->get();
    }
    public function getById(int $id)
    {
        return artistInvitation::where('id',$id)->first();
    }
}