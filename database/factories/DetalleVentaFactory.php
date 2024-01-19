<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleVenta>
 */
class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID_DetalleVenta' => $this->faker->unique()->numberBetween(1, 300),
            'Cantidad' => $this->faker->numberBetween(1, 10),
            'Tipo' => $this->faker->text(200),
            'Precio_Unitario' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}
