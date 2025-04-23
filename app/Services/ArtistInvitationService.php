<?php

namespace App\Services;

use App\Repositories\Contracts\ArtistInvitationInterface;
use App\Repositories\Contracts\EventInterface;


class ArtistInvitationService{
    private $artistrepository;
    private $event;

    public function __construct(ArtistInvitationInterface $artistrepository,EventInterface $event)
    {
        $this->artistrepository = $artistrepository;
        $this->event = $event;
    }

    public function showInvitation(){
        return $this->artistrepository->getAll();
    }
    public function acceptInvitation(int $invitationId){
        $this->artistrepository->acceptInvitation($invitationId);
        $data = $this->artistrepository->getById($invitationId);
        // to update the event status
        $this->event->updateStatus($data->eventsId,'active');
    }
    public function refuseInvitation(int $invitationId){
        $this->artistrepository->refuseInvitation($invitationId);
        $data = $this->artistrepository->getById($invitationId);
        $this->event->updateStatus($data->eventsId,'desactive');

    }
    public function availlability(){
        return $this->artistrepository->availability();
    }
}