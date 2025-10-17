<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('unidades')) {
            Schema::create('unidades', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('planificacion_id');
                $table->foreign('planificacion_id')->references('id')->on('planificacions')->onDelete('cascade');
                $table->integer('numero');
                $table->string('titulo');
                $table->timestamps();
            });
        } else {
            // Si la tabla ya existe, verificar y agregar columnas faltantes
            Schema::table('unidades', function (Blueprint $table) {
                if (!Schema::hasColumn('unidades', 'titulo')) {
                    $table->string('titulo')->after('numero');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}