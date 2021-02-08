<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist::class;

    const NATIONALITY = ['FR', 'EN', 'US', 'CA', 'BE', 'IT', 'EN'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_date' => $this->faker->date('Y-m-d', '2000-01-01'),
            'death_date' => $this->faker->boolean(20) ? $this->faker->date('Y-m-d') : null,
            'nationality_id' => $this->faker->boolean(60) ? $this->faker->randomElement(self::NATIONALITY) : null,
        ];
    }

}
