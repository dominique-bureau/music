<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Band;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        Artist::factory(100)->create();
        Band::factory(20)->create();


        $this->call([
            ArtistBandSeeder::class,
            AlbumSeeder::class,
            SongSeeder::class,
            InstrumentSeeder::class,
            ArtistInstrumentSeeder::class,
            LyricSeeder::class
        ]);
    }

}
