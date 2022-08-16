<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPlanEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_plan_estudios', function (Blueprint $table) {
            $table->id();
            $table->integer('carrera_id');
            $table->integer('materia_id');
            $table->integer('anio_curdada');
            $table->integer('periodo_academico_id');
            $table->timestamps();

            /*
            $table->integer('');
            $table->integer('')->default(0);
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
        Schema::dropIfExists('materia_plan_estudios');
    }
}
