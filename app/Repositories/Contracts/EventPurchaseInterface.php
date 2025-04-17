<?php

namespace App\Repositories\Contracts;

interface EventPurchaseInterface{
    public function create(array $data);
    public function getPurchaseWithEvent(int $id);
    public function getUserPurchase(int $userId,int $eventId);
    // check if the use already buy a ticket 
    public function checkTicket(int $userId,int $eventId);
    public function revenue();
}