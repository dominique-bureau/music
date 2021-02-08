<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $instuments = [
            'Keyboard',
            'Electric Guitar',
            'Bass Guitar',
            'Classic Guitar',
            'Drums',
            'Voice',
            'Violin',
            'Piano'
        ];

        foreach ($instuments as $instrument) {
            Instrument::create([
                'name' => $instrument
            ]);
        }
    }

}
