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
            'time'=> $this-> faker-> time('H:i'),
            'active'=> $this->faker->numberBetween(0,2)
        
        ];
    }
}
