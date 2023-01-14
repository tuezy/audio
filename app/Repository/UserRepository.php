<?php
namespace App\Repository;

use App\Models\User;
use App\Repository\Base\Repository;

class UserRepository extends Repository{

    public function model()
    {
       return User::class;
    }
}
