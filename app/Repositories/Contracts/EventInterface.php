<?php

namespace App\Repositories\Contracts;

interface EventInterface{
    public function create(array $data);
    public function update(int $id,array $data);
    public function findById(int $id);
    public function all();
    public function destroy(int $id);
    public function EventsCount();
    public function updateStatus(int $id,string $status);
    // show all active event for the admin
    public function allActive();
    // get all the events with status done to show to the user
    public function Events();
    // to get event details
    public function eventdetails(int $id);
    // to get the price in the paypal traitement
    public function getEventPrice(int $id);
}