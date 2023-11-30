<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormacionRecursoHumanoToPlanificacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->boolean('formacion_recurso_humano')->default(0)->after('auxiliar_docente_estudiantil');
            $table->text('formacion_recurso_humano_detalle')->nullable()->after('formacion_recurso_humano');
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
            $table->boolean('formacion_recurso_humano')->default(0)->after('electiva_nombre');
            $table->text('formacion_recurso_humano_detalle')->nullable()->after('auxiliar_docente_estudiantil');
        });
    }
}
