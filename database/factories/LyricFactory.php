<?php

namespace Database\Factories;

use App\Models\Lyric;
use Illuminate\Database\Eloquent\Factories\Factory;

class LyricFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lyric::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $quantityLines = random_int(10, 60);

        $lyrics = '';
        for ($i = 1; $i < $quantityLines; $i++) {
            $lyrics = $lyrics . $this->faker->sentence(random_int(1, 10)) . '\r\n';
        }

        return [
            'lyrics' => $lyrics
        ];
    }

}
