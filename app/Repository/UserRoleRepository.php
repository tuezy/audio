<?php
namespace App\Repository;

use App\Models\UserRole;
use App\Repository\Base\Repository;

class UserRoleRepository extends Repository{

    public function model()
    {
        return UserRole::class;
    }
}
