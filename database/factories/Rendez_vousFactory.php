<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Rendez_vousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'etablissement_id'=> $this-> faker-> numberBetween(1,50),
            'client_id'=> $this-> faker-> numberBetween(1,50),
            'date'=> $this-> faker-> dateTimeBetween('-3 week', '+7 week'),
            // 'time'=> $this->faker-> numberBetween(0,2),
            'time'=> $this->faker-> randomElement(['08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00',]),
            // 'time'=> $this->faker-> time('H:i', rand(480,54000)),
            // 'time'=> $this-> faker-> time('H:i'),
            'active'=> $this->faker->numberBetween(0,2)
        ];
    }
}
