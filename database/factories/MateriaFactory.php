<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_siu' => $this->faker->lexify(),
            'nombre' => $this->faker->sentence(3),
            'nombre_reducido' => $this->faker->sentence(1)
        ];
    }
}
