<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'artist_id' => Artist::factory(),
            'duration' => $this->faker->numberBetween(120, 420), // duration in seconds
        ];
    }
}
