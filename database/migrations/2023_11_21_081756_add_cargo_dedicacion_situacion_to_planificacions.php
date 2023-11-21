<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCargoDedicacionSituacionToPlanificacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->integer('situacion_cargo_id')->nullable()->after('docente_id');
            $table->integer('dedicacion_id')->nullable()->after('docente_id');
            $table->integer('cargo_id')->nullable()->after('docente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->dropColumn('situacion_cargo_id');
            $table->dropColumn('dedicacion_id');
            $table->dropColumn('cargo_id');
        });
    }
}
