<?php
namespace App\Repository;

use App\Models\Role;
use App\Repository\Base\Repository;

class RoleRepository extends Repository{

    public function model()
    {
       return Role::class;
    }
}
