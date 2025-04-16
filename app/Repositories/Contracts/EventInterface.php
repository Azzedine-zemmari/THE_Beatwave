<?php

namespace App\Repositories\Contracts;

interface EventInterface{
    public function create(array $data);
    public function update(int $id,array $data);
    public function findById(int $id);
    public function all();
    public function destroy(int $id);
    public function EventsCount();
}