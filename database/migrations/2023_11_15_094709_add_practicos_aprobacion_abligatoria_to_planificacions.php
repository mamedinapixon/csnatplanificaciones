<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPracticosAprobacionAbligatoriaToPlanificacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->boolean('practicos_aprobacion_abligatoria')->default(0)->after('carga_horaria_semanal_teorica');
            $table->text('practicos_aprobacion_abligatoria_detalle')->nullable()->after('practicos_aprobacion_abligatoria');
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
            $table->dropColumn('practicos_aprobacion_abligatoria');
            $table->dropColumn('practicos_aprobacion_abligatoria_detalle');
        });
    }
}
