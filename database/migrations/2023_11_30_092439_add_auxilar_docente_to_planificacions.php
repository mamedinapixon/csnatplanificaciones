<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuxilarDocenteToPlanificacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->boolean('auxiliar_docente_estudiantil')->default(0)->after('electiva_nombre');
            $table->text('auxiliar_docente_estudiantil_detalle')->nullable()->after('auxiliar_docente_estudiantil');
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
            $table->dropColumn('auxiliar_docente_estudiantil');
            $table->dropColumn('auxiliar_docente_estudiantil_detalle');
        });
    }
}
