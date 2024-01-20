<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DetalleVenta;
use App\Models\Inventario;
use App\Models\Persona;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Persona::factory(300)->create();
        //Producto::factory(300)->create();
        //Inventario::factory(300)->create();
        //DetalleVenta::factory(300)->create();
        //$this->call(PersonaSeeder::class);
        
    }
}
