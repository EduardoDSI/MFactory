<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID_Persona' => $this->faker->unique()->numberBetween(1, 300),
            'Nombre' => $this->faker->firstName,
            'Apellido' => $this->faker->lastName,
            'Fecha_nacimiento' => $this->faker->date(),
            'telefono' => substr($this->faker->phoneNumber, 0, 10), 
            //'ID_Documento' => $this->faker->unique()->numberBetween(1, 300),
        ];
    }
}
