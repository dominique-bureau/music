<?php

namespace Database\Factories;

use App\Models\ArtistBand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistBandFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArtistBand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date()
        ];
    }

}
