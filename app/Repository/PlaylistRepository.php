<?php
namespace App\Repository;

use App\Models\Playlist;
use App\Repository\Base\Repository;

class PlaylistRepository extends Repository{

    public function model()
    {
        return Playlist::class;
    }
}
