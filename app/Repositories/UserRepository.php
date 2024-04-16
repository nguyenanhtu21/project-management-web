<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository{

    public function getAll(){
        $users = User::with('person', 'roles')->get();
        return $users;
    }
   
    public function save(User $user){
        $user->save();
    }

    public function getById($id){
        $user = User::find($id);
        return $user;
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
    }
}