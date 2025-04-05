<?php

namespace App\Repositories\Contracts;

interface ArtistInvitationInterface{
    public function create(array $data);
    public function getAll();
    public function updateStatus(int $invitationId,string $status);
    public function availability();
}