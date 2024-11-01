<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_temas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planificacion_id')->constrained('planificacions')->onDelete('cascade');
            $table->json('modalidad');
            $table->json('caracter');
            $table->date('fecha');
            $table->text('contenido');
            $table->integer('cantidad_alumnos');
            $table->integer('duracion_minutos');
            $table->integer('unidad');
            $table->text('Observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_temas');
    }
}
