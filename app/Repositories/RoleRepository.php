<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository{
    private $roleModel;
    public function __construct(Role $role){
        $this->roleModel = $role;
    }

    public function getAll(){
        return $this->roleModel->all();
    }
}