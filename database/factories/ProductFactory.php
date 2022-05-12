<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomNumber(2),
            'img' => 'https://picsum.photos/700/400?random',
            // numero aleatorio entre 1 y 10
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
