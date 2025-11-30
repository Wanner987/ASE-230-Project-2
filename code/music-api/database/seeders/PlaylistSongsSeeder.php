<?php

namespace Database\Seeders;

use App\Models\PlaylistSongs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlaylistSongs::factory()
            ->count(50)
            ->create();
    }
}
