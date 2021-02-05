<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Band;
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
            ['name' => 'Tony BANKS', 'birth_date' => '1950-03-27', 'nationality_id' => 'GB'],
            ['name' => 'Phil COLLINS', 'birth_date' => '1951-01-30', 'nationality_id' => 'GB'],
            ['name' => 'Peter GABRIEL', 'birth_date' => '1950-02-13', 'nationality_id' => 'GB'],
            ['name' => 'Steve HACKETT', 'birth_date' => '1950-02-12', 'nationality_id' => 'GB'],
            ['name' => 'Mike RUTHERFORD', 'birth_date' => '1950-10-02', 'nationality_id' => 'GB'],
        ];

        Band::create([
            'name' => $band['name'],
            'creation_year' => $band['creation_year']
        ]);

        foreach ($artists as $artist) {
            Artist::create([
                'name' => $artist['name'],
                'birth_date' => $artist['birth_date'],
                'nationality_id' => $artist['nationality_id']
            ]);
        }
    }

}
