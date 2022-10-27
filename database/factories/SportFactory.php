<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sportNames = ['CSGO 1v1', 'CSGO 5v5', 'Bowling', 'Futsal', 'Darts', 'Double'];

        return [
            'name' => $this->faker->unique()->randomElement($sportNames),
            'number_of_players' => $this->faker->randomDigit(),
        ];
    }
}
