<?php 

namespace App\Repositories;

use App\Models\Commentaire;
use App\Repositories\Contracts\CommentaireInterface;
use Illuminate\Support\Facades\DB;

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
        return DB::table('commentaire')
        ->join('events_submissions','events_submissions.id','=','commentaire.eventId')
        ->join('users','users.id','commentaire.userId')
        ->select('users.avatar','users.Firstname','users.LastName','commentaire.commentaire')
        ->where('commentaire.eventId',$eventId)
        ->get();
    }
}