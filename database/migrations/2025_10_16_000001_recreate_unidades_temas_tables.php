<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateUnidadesTemasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Deshabilitar restricciones de clave foránea temporalmente
        Schema::disableForeignKeyConstraints();

        // Eliminar tablas si existen
        Schema::dropIfExists('temas');
        Schema::dropIfExists('unidades');

        // Recrear tabla unidades
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planificacion_id');
            $table->foreign('planificacion_id')->references('id')->on('planificacions')->onDelete('cascade');
            $table->integer('numero');
            $table->string('titulo');
            $table->timestamps();
        });

        // Recrear tabla temas
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->string('nombre');
            $table->text('detalle')->nullable();
            $table->timestamps();
        });

        // Habilitar restricciones de clave foránea
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas');
        Schema::dropIfExists('unidades');
    }
}