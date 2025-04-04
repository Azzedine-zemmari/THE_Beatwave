<?php

namespace App\Repositories\Contracts;

interface ArtistInvitationInterface{
    public function create(array $data);
    public function getAll();
}