<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtablissementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this-> faker-> name,
            'phone'=> $this-> faker-> phoneNumber(),
            'categorie'=> $this-> faker->randomElement(['Retailers', 'Sports', 'Médical', 'Education', 'Officiel']),
            'adresse'=> $this-> faker->address(),
            'service'=> $this-> faker-> numberBetween(1,10),
            'user_id'=> $this-> faker-> numberBetween(1,4),
            'user_id'=> $this-> faker-> numberBetween(1,4),
            // 'url'=> $this-> faker->slug(1, false),
            'url'=> $this-> faker->bothify('????????'),
            // 'url'=> $this-> faker->str_random(8)->unique(),
            'description'=> $this-> faker->sentence(13,true),
            'active'=> $this->faker->numberBetween(0,1)

        ];
    }
}
