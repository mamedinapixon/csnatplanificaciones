<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionLibroTemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacion_libro_tema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_tema_id')->constrained('libro_temas')->onDelete('cascade');
            $table->foreignId('planificacion_id')->constrained('planificacions')->onDelete('cascade');
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
        Schema::dropIfExists('planificacion_libro_tema');
    }
}
