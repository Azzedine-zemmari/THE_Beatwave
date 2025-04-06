<?php

namespace App\Services;

use App\Repositories\Contracts\EventSubmissionInterface;

class EventSubmissionService{
    private $eventsubmissionRepository;
    public function __construct(EventSubmissionInterface $eventsubmissionRepository)
    {
        $this->eventsubmissionRepository = $eventsubmissionRepository;
    }

    public function showEvents(){
        return $this->eventsubmissionRepository->getAll();
    }
    public function acceptEvent(int $id){
        return $this->eventsubmissionRepository->updateSatatus($id,'accept');
    }
    public function refuseEvent(int $id){
        return $this->eventsubmissionRepository->updateSatatus($id,'refuse');
    }
}