<?php
namespace App\Repository;

use App\Models\Permission;
use App\Repository\Base\Repository;

class PermissionRepository extends Repository{

    public function model()
    {
        return Permission::class;
    }
}
