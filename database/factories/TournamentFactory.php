<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tournamentNames = ['World Championship', 'Spring tournament', 'Winter tournament'];
        $startDate = $this->faker->dateTimeBetween('+0 days', '+1 month');
        $startDateClone = clone $startDate;

        return [
            'tournament_name' => $this->faker->randomElement($tournamentNames),
            'description' => $this->faker->paragraph(),
            'start_date' => $startDate,
            'end_date' => $this->faker->dateTimeBetween($startDate, $startDateClone->modify('+10 days')),
            'pricepool' => $this->faker->randomFloat(2, 1000, 100000),
            'is_approved' => rand(0,1),
            'number_of_participants' => $this->faker->randomElement(array(4,8,16,32,64)),
            'manager_id' => rand(1,50),
            'sport_id' => rand(1,3),
        ];
    }
}
