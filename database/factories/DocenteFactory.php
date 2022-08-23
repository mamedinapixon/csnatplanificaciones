<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'Apellido' => $this->faker->name(),
            'Nombre' => $this->faker->name(),
            'tipo_documento_id' => 1,
            'nro_documento' => $this->faker->randomNumber(5, true)
        ];
    }
}
