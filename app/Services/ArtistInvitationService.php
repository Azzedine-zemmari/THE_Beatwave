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
    public function acceptInvitation(int $invitationId){
        return $this->artistrepository->updateStatus($invitationId,'accept');
    }
    public function refuseInvitation(int $invitationId){
        return $this->artistrepository->updateStatus($invitationId,'refuse');
    }
    public function availlability(){
        return $this->artistrepository->availability();
    }
}