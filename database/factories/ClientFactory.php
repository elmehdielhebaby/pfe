<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'client_id'=> $this->faker->numberBetween(1,19),
            'user_id'=> $this->faker->numberBetween(1,19),
            'phone'=> $this->faker->phoneNumber(),
            'age'=> $this->faker-> numberBetween(1,120),
            'adresse'=> $this->faker->address(),
            'cin'=> $this->faker->bothify('????????'),
            'genre'=> $this-> faker->randomElement(['H','F'])

        ];
    }
}
