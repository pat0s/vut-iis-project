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
            'logo_url' => $this->faker->imageUrl(),
            'number_of_players' => $this->faker->randomNumber(2),
            'manager_id' => $this->faker->randomDigitNotZero(),
        ];
    }
}
