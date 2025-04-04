<?php

namespace App\Services;
use App\Repositories\Contracts\ArtistInvitationInterface;


class ArtistInvitationService{
    private $artistrepository;

    public function __construct(ArtistInvitationInterface $artistrepository)
    {
        $this->artistrepository = $artistrepository;
    }

    public function showInvitation(){
        return $this->artistrepository->getAll();
    }
}