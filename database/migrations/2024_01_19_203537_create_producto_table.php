<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('ID_Producto');
            $table->string('Nombre', 100)->nullable(false);
            //$table->unsignedBigInteger('ID_Categoria');
            //$table->unsignedBigInteger('ID_TipoProducto');
            $table->decimal('Precio', 10, 2);
            $table->integer('Stock');
            $table->timestamps();

            //$table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias');
            //$table->foreign('ID_TipoProducto')->references('ID_TipoProducto')->on('tipo_productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
