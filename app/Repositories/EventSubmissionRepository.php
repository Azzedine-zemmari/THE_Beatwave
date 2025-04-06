<?php

namespace App\Repositories;

use App\Models\Events_submission;
use App\Repositories\Contracts\EventSubmissionInterface;

class EventSubmissionRepository implements EventSubmissionInterface{
    public function getAll()
    {
      
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