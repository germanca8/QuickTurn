<?php

namespace Database\Factories;

use App\Models\Invitado;
use App\Models\Seccion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turno>
 */
class TurnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'seccion_id'            => Seccion::factory()->create(),
            'invitado_id'           => Invitado::factory()->create(),
            'numTurno'              => $this->faker->countryCode,
            'fechaTurno'            => $this->faker->dateTime,
        ];
    }
}
