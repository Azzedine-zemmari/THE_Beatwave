<?php

namespace App\Repositories\Contracts;

interface ArtistInvitationInterface{
    public function create(array $data);
    public function getAll();
    public function acceptInvitation(int $id);
    public function refuseInvitation(int $id);
    // public function updateStatus(int $invitationId,string $status);
    public function availability();
    public function getById(int $id);
}