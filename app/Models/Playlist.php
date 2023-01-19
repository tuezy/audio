<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;


    public const Playlist_TYPE_MORNING = 'morning';

    public const Playlist_TYPE_AFTERNOON = 'afternoon';

    public const Playlist_TYPE_EVENING = 'evening';

    protected $fillable = ['folder','type', 'broadcast_date','user_id'];

    public function audio(){
        return $this->hasMany(Audio::class);
    }
}
