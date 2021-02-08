<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\ArtistInstrument;
use App\Models\Instrument;
use Illuminate\Database\Seeder;

class ArtistInstrumentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $artists = Artist::all();
        $instruments = Instrument::all();

        foreach ($artists as $artist) {
            $instrumentsPlayed = $instruments->random(random_int(1, 2));

            foreach ($instrumentsPlayed as $instrumentPlayed) {
                ArtistInstrument::create([
                    'artist_id' => $artist->id,
                    'instrument_id' => $instrumentPlayed->id,
                ]);
            }
        }
    }

}
