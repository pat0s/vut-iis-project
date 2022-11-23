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
        $sportNames = ['CSGO', 'DOTA', 'Bowling', 'Futsal', 'Darts', 'Badminton', 'Basketball',
            'Double', 'Chess', 'Billiard', 'Football', 'Ping-pong', 'Kinball', 'Baseball',
            'Call of Duty', 'Hide-and-seek', 'League of Legends', 'Running', 'Figure skating'];

        return [
            'name' => $this->faker->unique()->randomElement($sportNames),
            'number_of_players' => $this->faker->randomDigitNotZero(),
        ];
    }
}
