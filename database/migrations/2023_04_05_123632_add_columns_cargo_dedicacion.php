<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsCargoDedicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memorias_asignaturas', function (Blueprint $table) {
            $table->string('cargo_id');
            $table->string('dedicacion_id');
            $table->string('situacion_cargo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memorias_asignaturas', function (Blueprint $table) {
            //
        });
    }
}
