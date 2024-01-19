<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID_Producto' => $this->faker->unique()->numberBetween(1, 300),
            'Nombre' => $this->faker->firstName,
            //'ID_Categoria' => $this->faker->numberBetween(1, 10),
            //'ID_TipoProducto' => $this->faker->numberBetween(1, 10),
            'Precio' => $this->faker->randomFloat(2, 10, 100),
            'Stock' => $this->faker->numberBetween(10, 100),
        ];
    }
}
