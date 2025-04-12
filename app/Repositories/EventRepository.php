<?php 

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\Contracts\EventInterface;

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
        
    }
}