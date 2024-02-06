<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnasMemorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memorias', function (Blueprint $table) {
            $table->text('describa_actividades_asignaturas')->nullable();
            $table->boolean('dirigio_tesis')->default(0);
            $table->text('dirigio_tesis_detalle')->nullable();
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
