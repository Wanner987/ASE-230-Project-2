<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlistSongs extends Model
{
    /** @use HasFactory<\Database\Factories\PlaylistSongsFactory> */
    use HasFactory;

    public function playlist() {
        return $this->belongsTo(playlist::class);
    }

    public function song() {
        return $this->belongsTo(song::class);
    }
}
