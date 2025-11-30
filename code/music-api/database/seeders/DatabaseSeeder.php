<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\PlaylistSongs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArtistSeeder::class,
            SongSeeder::class,
            PlaylistSeeder::class,
            PlaylistSongsSeeder::class,
            UserSeeder::class,
        ]);
        // Users are seeded by UserSeeder
    }
}
