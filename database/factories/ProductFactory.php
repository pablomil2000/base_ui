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
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => 'https://picsum.photos/200/300',
            'price' => $this->faker->randomFloat(2, 0, 100),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
