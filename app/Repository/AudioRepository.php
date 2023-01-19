<?php
namespace App\Repository;

use App\Models\Audio;
use App\Repository\Base\Repository;

class AudioRepository extends Repository{

    public function model()
    {
        return Audio::class;
    }
}
