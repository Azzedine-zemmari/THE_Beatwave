<?php 

namespace App\Repositories\Contracts;

interface UserRepositoryInterface{
    public function create(array $data);
    public function findByEmail(string $email);
    public function findById(int $id);
    public function findByRole(string $role);
    public function update(int $id,array $data);
    public function findByName(string $name);
}