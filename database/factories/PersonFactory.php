<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->streetAddress(),
            'username' => $this->faker->unique()->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image_url' => $this->faker->imageUrl(),
            'role_id' => rand(1,2),
        ];
    }
}
