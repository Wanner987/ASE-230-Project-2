<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\PlaylistSongs;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\playlistSongs>
 */
class PlaylistSongsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'playlist_id' => Playlist::factory(),
            'song_id' => Song::factory(),
        ];
    }
}
