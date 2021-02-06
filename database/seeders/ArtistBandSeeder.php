<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Band;
use App\Models\ArtistBand;
use Illuminate\Database\Seeder;

class ArtistBandSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $bands = Band::all();
        $artists = Artist::all();

        foreach ($bands as $band) {

            $artistsOfBand = $artists->random(random_int(2, 5));

            foreach ($artistsOfBand as $artist) {
                ArtistBand::factory()->create([
                    'band_id' => $band->id,
                    'artist_id' => $artist->id
                ]);
            }
        }
    }

}
