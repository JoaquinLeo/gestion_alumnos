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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('direccion', 100);
            $table->integer('telefono')->length(10)->unique();
            $table->string('fecha_nac', 100);

            $table->unsignedInteger('carrera')->nullable();
            $table->foreign('carrera')->references('id')->on('carreras');

            $table->unsignedInteger('id_genero')->nullable();
            $table->foreign('id_genero')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
