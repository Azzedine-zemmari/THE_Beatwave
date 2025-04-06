<?php

namespace App\Services;

use App\Providers\EventSubmissionProvider;
use App\Repositories\Contracts\ArtistInvitationInterface;
use App\Repositories\Contracts\EventSubmissionInterface;


class ArtistInvitationService{
    private $artistrepository;
    private $eventSubmission;

    public function __construct(ArtistInvitationInterface $artistrepository,EventSubmissionInterface $eventSubmission)
    {
        $this->artistrepository = $artistrepository;
        $this->eventSubmission = $eventSubmission;
    }

    public function showInvitation(){
        return $this->artistrepository->getAll();
    }
    public function acceptInvitation(int $invitationId){
        $this->artistrepository->acceptInvitation($invitationId);
        $data = $this->artistrepository->getById($invitationId);
        $submission = $this->eventSubmission->create([
            'organizerId' => $data->organizerId,
            'artistId' => $data->artistId,
            'eventId' => $data->eventsId
        ]);
    }
    public function refuseInvitation(int $invitationId){
        return $this->artistrepository->refuseInvitation($invitationId);
    }
    public function availlability(){
        return $this->artistrepository->availability();
    }
}