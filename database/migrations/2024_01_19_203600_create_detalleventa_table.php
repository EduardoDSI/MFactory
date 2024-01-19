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
        Schema::create('detalleventa', function (Blueprint $table) {
            $table->id('ID_DetalleVenta');
            //$table->unsignedBigInteger('ID_Venta');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('Cantidad');
            $table->string('Tipo', 200);
            $table->decimal('Precio_Unitario', 10, 2);
            $table->timestamps();

            //$table->foreign('ID_Venta')->references('ID_Venta')->on('ventas');
            $table->foreign('ID_Producto')->references('ID_Producto')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleventa');
    }
};
