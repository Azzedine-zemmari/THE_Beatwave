<?php

namespace App\Repositories;

use App\Models\artistInvitation;
use App\Repositories\Contracts\ArtistInvitationInterface;

class ArtistInvitationRepository implements ArtistInvitationInterface{
    public function create(array $data)
    {
        return artistInvitation::create([
            'artistId' => $data['artistId'],
            'organizerId' => $data['organizerId'],
            'eventsId' => $data['eventsId']
        ]);
    }
}