<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'name' => Str::random(30),
            'name' => $this->faker->colorName(),
            'number_of_players' => $this->faker->randomDigit(),
        ];
    }
}
