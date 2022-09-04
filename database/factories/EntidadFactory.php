<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entidad>
 */
class EntidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'               => User::factory()->create(),
            'nombreEntidad'         => $this->faker->name,
            'direccionEntidad'      => $this->faker->address,
            'horarioEntidad'        => $this->faker->randomElement(['9h - 21h' ,'9h - 14h, 18h - 21h']),
            'nombreFiscal'          => $this->faker->name,
            'nif'                   => $this->faker->postcode,
            'url'                   => $this->faker->url,
        ];
    }
}
