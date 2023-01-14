<?php
namespace App\Repository;

use App\Models\RolePermission;
use App\Models\User;
use App\Repository\Base\Repository;

class RolePermissionRepository extends Repository{

    public function model()
    {
        return RolePermission::class;
    }
}
