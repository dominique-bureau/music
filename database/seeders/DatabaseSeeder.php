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
    }

}
