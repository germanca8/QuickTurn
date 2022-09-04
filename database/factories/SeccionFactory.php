<?php

namespace Database\Factories;

use App\Models\Entidad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'entidad_id'            => Entidad::factory()->create(),
            'nombreSeccion'         => $this->faker->name,
            'turnoActual'           => 0,
            'ultimoTurno'           => 0,
        ];
    }
}
