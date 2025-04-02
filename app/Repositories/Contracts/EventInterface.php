<?php

namespace App\Repositories\Contracts;

interface EventInterface{
    public function create(array $data);
}