<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\ArtistBand;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Database\Seeder;

class GenesisSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $band = [
            'name' => 'GENESIS',
            'creation_year' => 1967
        ];

        $artists = [
            ['first_name' => 'Tony', 'last_name' => 'BANKS', 'birth_date' => '1950-03-27', 'nationality_id' => 'GB'],
            ['first_name' => 'Phil', 'last_name' => 'COLLINS', 'birth_date' => '1951-01-30', 'nationality_id' => 'GB'],
            ['first_name' => 'Peter', 'last_name' => 'GABRIEL', 'birth_date' => '1950-02-13', 'nationality_id' => 'GB'],
            ['first_name' => 'Steve', 'last_name' => 'HACKETT', 'birth_date' => '1950-02-12', 'nationality_id' => 'GB'],
            ['first_name' => 'Mike', 'last_name' => 'RUTHERFORD', 'birth_date' => '1950-10-02', 'nationality_id' => 'GB'],
        ];

        $albums = [
            ['name' => 'From Genesis to Revelation', 'release_date' => '1969-03-07'],
            ['name' => 'Trespass', 'release_date' => '1970-10-23'],
            ['name' => 'Nursery Cryme', 'release_date' => '1971-11-12'],
            ['name' => 'Foxtrot', 'release_date' => '1972-10-06'],
            ['name' => 'Selling England by the Pound', 'release_date' => '1973-10-12'],
            ['name' => 'The Lamb Lies Down on Broadway', 'release_date' => '1974-11-18'],
            ['name' => 'A Trick of the Tail', 'release_date' => '1976-02-02',
                'songs' => [
                    ['name' => 'Dance On a Volcano', 'position' => 1, 'duration' => 353],
                    ['name' => 'Entangled', 'position' => 2, 'duration' => 388],
                    ['name' => 'Squonk', 'position' => 3, 'duration' => 387],
                    ['name' => 'Mad Man Moon', 'position' => 4, 'duration' => 455],
                    ['name' => 'Robbery, Assault & Battery', 'position' => 5, 'duration' => 375],
                    ['name' => 'Ripples', 'position' => 6, 'duration' => 483],
                    ['name' => 'A Trick of The Tail', 'position' => 7, 'duration' => 274],
                    ['name' => 'Los Endos', 'position' => 8, 'duration' => 347],
                ]
            ],
            ['name' => 'Wind & Wuthering', 'release_date' => '1976-12-23'],
            ['name' => '... And Then There Were Three...', 'release_date' => '1978-04-07'],
            ['name' => 'Duke', 'release_date' => '1980-03-29'],
            ['name' => 'Abacab', 'release_date' => '1981-09-18'],
            ['name' => 'Genesis', 'release_date' => '1983-10-03'],
            ['name' => 'Invisible Touch', 'release_date' => '1986-06-09'],
            ['name' => 'We can\'t Dance', 'release_date' => '1991-10-28'],
            ['name' => 'Calling All Stations', 'release_date' => '1997-09-02'],
            ['name' => 'Genesis Live', 'release_date' => '1973-08-03'],
            ['name' => 'Seconds Out', 'release_date' => '1977-10-21'],
            ['name' => 'Three Sides Live', 'release_date' => '1982-06-01'],
            ['name' => 'The Way We Walk, Volume One: The Shorts', 'release_date' => '1992-11-16'],
            ['name' => 'The Way We Walk, Volume Two: The Longs', 'release_date' => '1993-01-11'],
            ['name' => 'Live Over Europe 2007', 'release_date' => '2007-11-26'],
        ];

        $bandCreated = Band::create([
                    'name' => $band['name'],
                    'creation_year' => $band['creation_year']
        ]);

        foreach ($artists as $artist) {
            $artistCreated = Artist::create([
                        'last_name' => $artist['last_name'],
                        'first_name' => $artist['first_name'],
                        'birth_date' => $artist['birth_date'],
                        'nationality_id' => $artist['nationality_id']
            ]);

            ArtistBand::create([
                'band_id' => $bandCreated->id,
                'artist_id' => $artistCreated->id
            ]);
        }

        foreach ($albums as $album) {
            $albumCreated = Album::create([
                        'band_id' => $bandCreated->id,
                        'name' => $album['name'],
                        'release_date' => $album['release_date']
            ]);

            if (array_key_exists('songs', $album)) {
                foreach ($album['songs'] as $song) {
                    Song::create([
                        'album_id' => $albumCreated->id,
                        'name' => $song['name'],
                        'position' => $song['position'],
                        'duration' => $song['duration']
                    ]);
                }
            }
        }
    }

}
