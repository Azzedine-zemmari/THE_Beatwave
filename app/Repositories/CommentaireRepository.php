<?php 

namespace App\Repositories;

use App\Models\Commentaire;
use App\Repositories\Contracts\CommentaireInterface;

class CommentaireRepository implements CommentaireInterface{
    public function create(array $data)
    {
        return Commentaire::create([
            'eventId' => $data['eventId'],
            'userId' => $data['userId'],
            'commentaire' => $data['commentaire']
        ]);
    }
    public function get(int $eventId)
    {
        return Commentaire::where('eventId',$eventId)->get();
    }
}