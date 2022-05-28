<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'party_id' => $this->faker->numberBetween(1, 100),
            'animator_id' => $this->faker->numberBetween(1, 40),
            'tiempo' => $this->faker->numberBetween(1, 10),
        ];
    }
}
