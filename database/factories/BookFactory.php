<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'author_id' => $this->faker->numberBetween(1, 20),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'editorial_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
