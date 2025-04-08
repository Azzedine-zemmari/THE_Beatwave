<?php

namespace App\Repositories\Contracts;

interface EventSubmissionInterface{
    public function getAll();
    public function create(array $data);
    public function updateSatatus(int $id,string $status);
    public function getSubmitedEvents();
    public function getSubmitedEvent(int $id);
    public function getEventPrice(int $id);
}