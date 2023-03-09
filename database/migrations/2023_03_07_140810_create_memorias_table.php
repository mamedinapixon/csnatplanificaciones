<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorias', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('periodo_lectivo_id');
            $table->integer('cargo_id');
            $table->integer('dedicacion_id');
            $table->boolean('dicto_cursos_grado')->default(0);
            $table->text('dicto_cursos_grado_detalle')->nullable();

            $table->boolean('participo_jurado_titular')->default(0);
            $table->text('participo_jurado_titular_detalle')->nullable();

            $table->boolean('designado_jurado_suplente')->default(0);
            $table->text('designado_jurado_suplente_detalle')->nullable();

            $table->boolean('jurado_titular_concursos')->default(0);
            $table->text('jurado_titular_concursos_detalle')->nullable();

            $table->boolean('designado_jurado_suplente_concursos')->default(0);
            $table->text('designado_jurado_suplente_concursos_detalle')->nullable();

            $table->boolean('participo_armado_aula_virtual')->default(0);

            $table->boolean('participo_elaboracion_propuesta_innovadora')->default(0);
            $table->text('participo_elaboracion_propuesta_innovadora_detalle')->nullable();

            $table->boolean('elaboro_material_didactico')->default(0);
            $table->text('elaboro_material_didactico_detalle')->nullable();

            $table->boolean('participo_dictado_cursos')->default(0);
            $table->text('participo_dictado_cursos_detalle')->nullable();

            $table->boolean('formo_parte_comite_carrera_posgrado')->default(0);
            $table->text('formo_parte_comite_carrera_posgrado_detalle')->nullable();

            $table->boolean('docente_estable_carrera_posgrado')->default(0);
            $table->text('docente_estable_carrera_posgrado_detalle')->nullable();

            $table->boolean('participo_supervision_tesis_posgrado')->default(0);
            $table->text('participo_supervision_tesis_posgrado_detalle')->nullable();

            $table->boolean('jurado_tesis_grado')->default(0);
            $table->text('jurado_tesis_grado_detalle')->nullable();

            $table->boolean('coordino_curso_posgrado')->default(0);
            $table->text('coordino_curso_posgrado_detalle')->nullable();

            $table->boolean('dicto_cursos_profesional')->default(0);
            $table->text('dicto_cursos_profesional_detalle')->nullable();

            $table->text('otras_actividades_posgrado')->default(0);

            $table->boolean('dirigio_tesinas_grado')->default(0);
            $table->text('dirigio_tesinas_grado_detalle')->nullable();

            $table->boolean('dirigio_pps')->default(0);
            $table->text('dirigio_pps_detalle')->nullable();

            $table->boolean('dirigio_frh_estudiantiles')->default(0);
            $table->text('dirigio_frh_estudiantiles_detalle')->nullable();

            $table->boolean('dirigio_frh_profesionales')->default(0);
            $table->text('dirigio_frh_profesionales_detalle')->nullable();

            $table->boolean('dirigio_pasantias_estudiantes')->default(0);
            $table->text('dirigio_pasantias_estudiantes_detalle')->nullable();

            $table->boolean('dirigio_pasantias_investigacion')->default(0);
            $table->text('dirigio_pasantias_investigacion_detalle')->nullable();

            $table->boolean('dirigio_becas')->default(0);
            $table->text('dirigio_becas_detalle')->nullable();

            $table->boolean('participo_otra_actividad_frh')->default(0);
            $table->text('participo_otra_actividad_frh_detalle')->nullable();

            $table->boolean('dirige_proyectos_investigacion')->default(0);
            $table->text('dirige_proyectos_investigacion_detalle')->nullable();

            $table->boolean('participa_investigador')->default(0);
            $table->text('participa_investigador_detalle')->nullable();

            $table->string('categoria_incentivo')->default('I');

            $table->boolean('miembro_conicet')->default(0);
            $table->text('miembro_conicet_detalle')->nullable();

            $table->boolean('parte_instituto_investigacion')->default(0);
            $table->text('parte_instituto_investigacion_detalle')->nullable();

            $table->boolean('recibio_premio_investigacion')->default(0);
            $table->text('recibio_premio_investigacion_detalle')->nullable();

            $table->boolean('realiazo_viajes_investigacion')->default(0);
            $table->text('realiazo_viajes_investigacion_detalle')->nullable();

            $table->boolean('participo_congresos_cientifica')->default(0);
            $table->text('participo_congresos_cientifica_detalle')->nullable();

            $table->text('mensione_produccion_cientifica')->nullable();
            $table->text('actividades_investigacion_relevante')->nullable();

            $table->boolean('miembro_consejo_directivo')->default(0);
            $table->text('miembro_consejo_directivo_detalle')->nullable();

            $table->integer('estamento_consejo_directivo_id')->default(0);

            $table->boolean('miembro_consejo_posgrado')->default(0);
            $table->boolean('miembro_consejo_departamento')->default(0);
            $table->text('miembro_consejo_departamento_detalle')->nullable();

            $table->boolean('represento_facultad')->default(0);
            $table->text('represento_facultad_detalle')->nullable();

            $table->boolean('miembro_comisiones_institucionales')->default(0);
            $table->text('miembro_comisiones_institucionales_detalle')->nullable();

            $table->boolean('participo_organizacion_eventos_cientificos')->default(0);
            $table->text('participo_organizacion_eventos_cientificos_detalle')->nullable();

            $table->boolean('participo_cargos_directivos')->default(0);
            $table->text('participo_cargos_directivos_detalle')->nullable();

            $table->boolean('dicto_charlas_conferencias')->default(0);
            $table->text('dicto_charlas_conferencias_detalle')->nullable();

            $table->boolean('participo_asesoramiento_cientifico')->default(0);
            $table->text('participo_asesoramiento_cientifico_detalle')->nullable();

            $table->boolean('elaboro_materiales_extension')->default(0);
            $table->text('elaboro_materiales_extension_detalle')->nullable();

            $table->boolean('participo_difusion_carreras')->default(0);
            $table->text('participo_difusion_carreras_detalle')->nullable();

            $table->boolean('participo_tarea_extension')->default(0);
            $table->text('participo_tarea_extension_detalle')->nullable();

            $table->boolean('realizo_prestacion_servicios')->default(0);
            $table->text('realizo_prestacion_servicios_detalle')->nullable();

            $table->boolean('realizo_infromes_tecnicos_empresas')->default(0);
            $table->text('realizo_infromes_tecnicos_empresas_detalle')->nullable();

            $table->boolean('tomo_cursos_posgrado')->default(0);
            $table->text('tomo_cursos_posgrado_detalle')->nullable();

            $table->boolean('curso_carrera_posgrado')->default(0);
            $table->text('curso_carrera_posgrado_detalle')->nullable();

            $table->boolean('realizo_trayecto_academico')->default(0);
            $table->text('realizo_trayecto_academico_detalle')->nullable();

            $table->boolean('obtuvo_beca_formacion_profesional')->default(0);
            $table->text('obtuvo_beca_formacion_profesional_detalle')->nullable();

            $table->text('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memorias');
    }
}
