<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_name' => 'Team_'.$this->faker->unique()->randomNumber(3),
            'number_of_players' => $this->faker->randomDigitNotZero(),
            'manager_id' => rand(1,100),
        ];
    }
}
