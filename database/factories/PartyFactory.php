<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word,
            'descripcion' => $this->faker->text,
            'fecha' => $this->faker->date,
            'lugar' => $this->faker->word,
            'hora' => $this->faker->time,
            'duracion' => $this->faker->numberBetween(1, 10),
            'precio' => $this->faker->randomFloat(0, 210),
            'user_id' => $this->faker->numberBetween(1, 11),
            'aceptada' => $this->faker->boolean,
            'asistentes' => $this->faker->randomNumber(2, 999),
        ];
    }
}
