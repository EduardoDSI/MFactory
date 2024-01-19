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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('ID_Inventario');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('StockInicial');
            $table->integer('StockActual');
            $table->date('FechaInventario');
            $table->timestamps();

            $table->foreign('ID_Producto')->references('ID_Producto')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
