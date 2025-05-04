<?php 

namespace App\Repositories\Contracts;

interface UserRepositoryInterface{
    public function create(array $data);
    public function findByEmail(string $email);
    public function findById(int $id);
    public function findByRole(int $role);
    public function update(int $id,array $data);
    public function findByName(string $name);
    public function findArtist();
    public function countUsers();
    public function dropUser(int $id);
    public function allUsers();
    public function UserSearch(string $name);
    public function activeUser(int $id);
}