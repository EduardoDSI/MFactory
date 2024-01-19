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
        Schema::create('persona', function (Blueprint $table) {
            $table->id('ID_Persona');
            $table->string('Nombre', 50);
            $table->string('Apellido', 50);
            $table->date('Fecha_nacimiento');
            $table->char('telefono', 10);
            //$table->unsignedBigInteger('ID_Documento');
            //$table->foreign('ID_Documento')->references('ID_Documento')->on('documento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
