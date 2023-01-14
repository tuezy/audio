<?php
namespace App\Repository;

use App\Models\Setting;
use App\Repository\Base\Repository;

class SettingRepository extends Repository{

    public function model()
    {
        return Setting::class;
    }
}
