<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $bands = Band::all();

        foreach ($bands as $band) {
            Album::factory(random_int(2, 10))->create([
                'band_id' => $band->id
            ]);
        }

        $artists = Artist::all();

        foreach ($artists as $artist) {
            Album::factory(random_int(2, 10))->create([
                'artist_id' => $artist->id
            ]);
        }
    }

}
