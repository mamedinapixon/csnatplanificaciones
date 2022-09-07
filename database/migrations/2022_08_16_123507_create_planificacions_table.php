<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('materia_plan_estudio_id');
            $table->integer('docente_id');
            $table->integer('periodo_lectivo_id');
            $table->string('electiva_nombre')->default('');
            $table->boolean('doc_invitados')->default(0);
            $table->integer('tipo_asignatura_id')->nullable();
            $table->integer('carga_horaria')->default(0);
            $table->integer('modalidad_dictado_teoriacas_id')->nullable();
            $table->integer('modalidad_dictado_practicas_id')->nullable();
            $table->integer('carga_horaria_semanal_practica')->default(0);
            $table->integer('carga_horaria_semanal_practica_teorica')->default(0);
            $table->integer('carga_horaria_semanal_teorica')->default(0);
            $table->integer('cantidad_parciales')->default(0);
            $table->integer('modalidad_parciales_id')->nullable();
            $table->boolean('salida_campo')->default(0);
            $table->integer('salida_campo_cantidad')->default(0);
            $table->boolean('salida_campo_conjuntas')->default(0);
            $table->text('salida_campo_catedras')->nullable();
            $table->boolean('actividades_conjuntas')->default(0);
            $table->text('actividades_conjuntas_catedras')->nullable();
            $table->text('actividades_conjuntas_tipo')->nullable();
            $table->boolean('actividades_complementarias')->default(0);
            $table->text('actividades_complementarias_tipo')->nullable();
            $table->boolean('aula_virtual')->default(0);
            $table->boolean('aula_virtual_complemento_dictado')->default(0);
            $table->boolean('herramientas_virtuales')->default(0);
            $table->text('herramientas_virtuales_previstas')->nullable();
            $table->text('necesidades')->nullable();
            $table->text('observacioens_sugerencias')->nullable();
            $table->softDeletes();
            $table->timestamps();

            /*
            $table->integer('');
            $table->string('');
            $table->text('');
            $table->boolean('');
            $table->char('name',1);
            */


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planificacions');
    }
}
