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
        $tournamentNames = ['World Championship', 'Spring Tournament', 'Winter Tournament', 'Regional Tournament',
            'Last One Standing', 'Europe Championship', 'In or Out', 'Mistas League', 'Way Cool Tournament',
            'King Pong', 'Royal Masters', 'Tournament of Champions', 'BigBlast', 'Ultiimate Battle'];

        $startDate = $this->faker->dateTimeBetween('+1 days', '+15 days');
        $startDateClone = clone $startDate;
        $numberOfParticipants = $this->faker->randomElement(array(4,8,16,32,64));

        return [
            'tournament_name' => $this->faker->randomElement($tournamentNames),
            'description' => $this->faker->paragraph(),
            'start_date' => $startDate,
            'end_date' => $this->faker->dateTimeBetween($startDate, $startDateClone->modify("+$numberOfParticipants days")),
            'pricepool' => $this->faker->randomFloat(2, 1000, 100000),
            'is_approved' => rand(0, 1),
            'number_of_participants' => $numberOfParticipants,
            'manager_id' => rand(480, 500),
            'sport_id' => rand(1, 15),
        ];
    }
}
