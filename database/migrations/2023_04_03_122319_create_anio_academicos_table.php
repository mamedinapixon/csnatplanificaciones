<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnioAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anio_academicos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio');
            $table->dateTime('planificacion_activo_desde');
            $table->dateTime('planificacion_activo_hasta');
            $table->dateTime('memoria_activo_desde');
            $table->dateTime('memoria_activo_hasta');
            $table->softDeletes();
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
        Schema::dropIfExists('anio_academicos');
    }
}
