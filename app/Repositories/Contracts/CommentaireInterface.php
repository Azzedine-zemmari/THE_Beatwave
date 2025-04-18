<?php

namespace App\Repositories\Contracts;

interface CommentaireInterface{
    public function create(array $data);
    public function get(int $eventId);
}