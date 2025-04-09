<?php

namespace App\Repositories\Contracts;

interface EventPurchaseInterface{
    public function create(array $data);
    public function getPurchaseWithEvent(int $id);
}