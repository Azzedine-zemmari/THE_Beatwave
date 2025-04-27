<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface{
    public function create(array $data){
        return User::create([
            'Firstname' => $data['Firstname'],
            'LastName' => $data['LastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function findByEmail(string $email)
    {
        return User::where('email',$email)->first();
    } 
    public function findById(int $id)
    {
        return User::find($id);
    }
    public function findByRole(int $role)
    {
        return User::where('role_id',$role)->get();
    }
    public function update(int $id,array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }
    // search for artist
    public function findByName(string $name)
    {
        return User::where('role_id',2)
        ->where('Firstname','like',"%$name%")
        ->orWhere('LastName','like',"%$name%")
        ->paginate(6); // use paginate because get dont have the pagination functionnality to help with ($data->links)
    }
    // find artist with paginate
    public function findArtist(){
        return User::where('role_id',2)->paginate(6);
    }
    public function countUsers()
    {
        return User::where('role_id',4)->count();
    }
    public function dropUser(int $id)
    {
        return $this->findById($id)->delete();
    }
    public function allUsers()
    {
        return DB::table('users')
        ->join('roles','roles.id','=','users.role_id')
        ->select('Firstname','LastName','email','roles.type','deleted_at','users.id as userId')
        ->where('roles.type','!=','admin')
        ->paginate(5);
    }
    public function UserSearch(string $name)
    {
        return User::where('Firstname','like',"%$name%")
        ->orWhere('LastName','like',"%$name%")
        ->paginate(5);
    }
}