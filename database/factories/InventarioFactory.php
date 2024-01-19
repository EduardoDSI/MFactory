<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID_Inventario' => $this->faker->unique()->numberBetween(1, 300),
            'ID_Producto' => $this->faker->numberBetween(1, 300),
            'StockInicial' => $this->faker->numberBetween(1, 100),
            'StockActual' => $this->faker->numberBetween(1, 100),
            'FechaInventario' => $this->faker->date(),
        ];
    }
}
