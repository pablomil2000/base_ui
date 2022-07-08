<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = rand(0,1) ? 'default.png' : 'http://placeimg.com/640/480/any';

        return [
            'name' => $this->faker->name(),
            'description_C'=>$this->faker->sentence(),
            'description_L'=>$this->faker->text(),
            'fecha_inicio'=>$this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'image' => $image,
            'capacidad' => $this->faker->numberBetween(1, 10),
            'precio' => $this->faker->numberBetween(10, 100),
            'user_id' => '2',
            'estado' => $this->faker->numberBetween(0, 3),
        ];
    }
}
