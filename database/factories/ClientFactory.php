<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            // 'client_id'=> $this->faker->numberBetween(1,19),
            'etablissement_id'=> $this->faker->numberBetween(1,50),
            'phone'=> $this->faker->phoneNumber(),
            'age'=> $this->faker-> numberBetween(1,120),
            'adresse'=> $this->faker->address(),
            'cin'=> $this->faker->bothify('????????'),
            'genre'=> $this-> faker->randomElement(['H','F'])

        ];
    }
}
