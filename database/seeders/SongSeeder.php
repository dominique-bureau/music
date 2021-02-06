<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $albums = Album::all();

        foreach ($albums as $album) {
            for ($i = 1; $i < random_int(2, 10); $i++) {
                Song::factory()->create([
                    'album_id' => $album->id,
                    'position' => $i
                ]);
            }
        }
    }

}
