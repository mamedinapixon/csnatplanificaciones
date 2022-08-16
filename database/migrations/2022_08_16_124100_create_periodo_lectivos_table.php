<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoLectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_lectivos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio_academico');
            $table->integer('periodo_academico_id');
            $table->dateTime('fecha_inicio_activo', $precision = 0);
            $table->dateTime('fecha_fin_activo', $precision = 0);
            $table->softDeletes();
            $table->timestamps();

            /*
            $table->integer('');
            $table->integer('')->default(0);
            $table->string('');
            $table->string('')->default('');
            $table->text('')->default('');
            $table->boolean('')->default(0);
            $table->char('name',1)->default('');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo_lectivos');
    }
}
