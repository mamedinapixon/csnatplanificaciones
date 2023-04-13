<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNuevasColumnasMemorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memorias', function (Blueprint $table) {
            $table->boolean('participo_jurado_grado')->default(0);
            $table->text('participo_jurado_grado_detalle')->nullable();

            $table->boolean('realiazo_viajes_campo')->default(0);
            $table->text('realiazo_viajes_campo_detalle')->nullable();

            $table->boolean('participo_cargos_gestion')->default(0);
            $table->text('participo_cargos_gestion_detalle')->nullable();

            $table->boolean('participo_actividades_gestion')->default(0);
            $table->text('participo_actividades_gestion_detalle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memorias', function (Blueprint $table) {
            //
        });
    }
}
