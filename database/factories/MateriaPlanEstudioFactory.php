<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaPlanEstudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carrera_id' => $this->faker->numberBetween(1, 3),
            'materia_id' => $this->faker->numberBetween(1, 20),
            'anio_curdada' => $this->faker->numberBetween(1, 4),
            'periodo_academico_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
