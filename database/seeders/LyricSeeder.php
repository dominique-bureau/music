<?php

namespace Database\Seeders;

use App\Models\Lyric;
use App\Models\Song;
use Illuminate\Database\Seeder;

class LyricSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $songs = Song::all();

        foreach ($songs as $song) {
            Lyric::factory()->create([
                'song_id' => $song->id
            ]);
        }
    }

}
