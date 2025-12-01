<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function song() {
        return $this->hasMany(song::class);
    }

    public function user() {
        return $this->hasOne(user::class);
    }

}
