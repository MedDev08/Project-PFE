<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salarie>
 */
class SalarieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cin'=>$this->faker->sentence(),
            'nom'=>$this->faker->lastname(),
            'prenom'=>$this->faker->firstname(),
            'tel'=>$this->faker->phoneNumber(),
            'salaire'=>$this->faker->randomFloat(2,1,100),
            'date_debut'=>$this->faker->dateTime(),
            'date_fin'=>$this->faker->dateTime(),
            'img'=>$this->faker->sentence(),
            'dispo'=>0
        ];
    }
}
