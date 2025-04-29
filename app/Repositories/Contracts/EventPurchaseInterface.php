<?php

namespace App\Repositories\Contracts;

interface EventPurchaseInterface{
    public function create(array $data);
    public function getPurchaseWithEvent(int $id);
    public function getUserPurchase(int $userId,int $eventId);
    // check if the use already buy a ticket 
    public function checkTicket(int $userId,int $eventId);
    public function revenue();
    // top events
    public function topEvent();
    //count number of ticket sold
    public function countPurchase();
    // get if the user buy a ticket for that event 
    public function CheckBuy(int $userId,int $eventId);
}