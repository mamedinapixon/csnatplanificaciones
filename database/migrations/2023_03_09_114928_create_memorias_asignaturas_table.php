<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriasAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorias_asignaturas', function (Blueprint $table) {
            $table->id();
            $table->integer('memoria_id');
            $table->integer('materia_id')->nullable();
            $table->string('asignatura');
            $table->string('tipo_docente');
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
        Schema::dropIfExists('memorias_asignaturas');
    }
}
