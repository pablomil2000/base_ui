<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GaleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            return [
                'title' => $this->faker->title(),
                'description' => $this->faker->string(),
                'user_id' => $this->faker->unique()->safeEmail(),
            ];
        ];
    }
}
