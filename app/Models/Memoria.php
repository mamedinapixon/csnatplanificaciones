<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Memoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'anio_academico',
        'cargo_id',
        'dedicacion_id',
        'situacion_cargo_id',

        'dicto_cursos_grado',
        'dicto_cursos_grado_detalle',

        'participo_jurado_grado',
        'participo_jurado_grado_detalle',

        'participo_jurado_titular',
        'participo_jurado_titular_detalle',

        'designado_jurado_suplente',
        'designado_jurado_suplente_detalle',

        'jurado_titular_concursos',
        'jurado_titular_concursos_detalle',

        'designado_jurado_suplente_concursos',
        'designado_jurado_suplente_concursos_detalle',

        'participo_armado_aula_virtual',

        'participo_elaboracion_propuesta_innovadora',
        'participo_elaboracion_propuesta_innovadora_detalle',

        'elaboro_material_didactico',
        'elaboro_material_didactico_detalle',

        'participo_dictado_cursos',
        'participo_dictado_cursos_detalle',

        'formo_parte_comite_carrera_posgrado',
        'formo_parte_comite_carrera_posgrado_detalle',

        'docente_estable_carrera_posgrado',
        'docente_estable_carrera_posgrado_detalle',

        'participo_supervision_tesis_posgrado',
        'participo_supervision_tesis_posgrado_detalle',

        'jurado_tesis_grado',
        'jurado_tesis_grado_detalle',

        'coordino_curso_posgrado',
        'coordino_curso_posgrado_detalle',

        'dicto_cursos_profesional',
        'dicto_cursos_profesional_detalle',

        'otras_actividades_posgrado',

        'dirigio_tesinas_grado',
        'dirigio_tesinas_grado_detalle',

        'dirigio_pps',
        'dirigio_pps_detalle',

        'dirigio_frh_estudiantiles',
        'dirigio_frh_estudiantiles_detalle',

        'dirigio_frh_profesionales',
        'dirigio_frh_profesionales_detalle',

        'dirigio_pasantias_estudiantes',
        'dirigio_pasantias_estudiantes_detalle',

        'dirigio_pasantias_investigacion',
        'dirigio_pasantias_investigacion_detalle',

        'dirigio_becas',
        'dirigio_becas_detalle',

        'participo_otra_actividad_frh',
        'participo_otra_actividad_frh_detalle',

        'dirige_proyectos_investigacion',
        'dirige_proyectos_investigacion_detalle',

        'participa_investigador',
        'participa_investigador_detalle',

        'categoria_incentivo',

        'miembro_conicet',
        'miembro_conicet_detalle',

        'parte_instituto_investigacion',
        'parte_instituto_investigacion_detalle',

        'recibio_premio_investigacion',
        'recibio_premio_investigacion_detalle',

        'realiazo_viajes_investigacion',
        'realiazo_viajes_investigacion_detalle',

        'realiazo_viajes_campo',
        'realiazo_viajes_campo_detalle',

        'participo_congresos_cientifica',
        'participo_congresos_cientifica_detalle',

        'mensione_produccion_cientifica',
        'actividades_investigacion_relevante',

        'miembro_consejo_directivo',
        'miembro_consejo_directivo_detalle',

        'estamento_consejo_directivo_id',

        'miembro_consejo_posgrado',
        'miembro_consejo_departamento',
        'miembro_consejo_departamento_detalle',

        'represento_facultad',
        'represento_facultad_detalle',

        'miembro_comisiones_institucionales',
        'miembro_comisiones_institucionales_detalle',

        'participo_organizacion_eventos_cientificos',
        'participo_organizacion_eventos_cientificos_detalle',

        'participo_cargos_directivos',
        'participo_cargos_directivos_detalle',

        'participo_cargos_gestion',
        'participo_cargos_gestion_detalle',

        'participo_actividades_gestion',
        'participo_actividades_gestion_detalle',

        'dicto_charlas_conferencias',
        'dicto_charlas_conferencias_detalle',

        'participo_asesoramiento_cientifico',
        'participo_asesoramiento_cientifico_detalle',

        'elaboro_materiales_extension',
        'elaboro_materiales_extension_detalle',

        'participo_difusion_carreras',
        'participo_difusion_carreras_detalle',

        'participo_tarea_extension',
        'participo_tarea_extension_detalle',

        'realizo_prestacion_servicios',
        'realizo_prestacion_servicios_detalle',

        'realizo_infromes_tecnicos_empresas',
        'realizo_infromes_tecnicos_empresas_detalle',

        'tomo_cursos_posgrado',
        'tomo_cursos_posgrado_detalle',

        'curso_carrera_posgrado',
        'curso_carrera_posgrado_detalle',

        'realizo_trayecto_academico',
        'realizo_trayecto_academico_detalle',

        'obtuvo_beca_formacion_profesional',
        'obtuvo_beca_formacion_profesional_detalle',

        'observaciones',
        'observaciones_revision',

        'presentado_at',
        'revisado_at',

        'estado_id',

        'describa_actividades_asignaturas',
        'dirigio_tesis',
        'dirigio_tesis_detalle'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'user_id' => 'integer',
        'anio_academico' => 'integer',
        'cargo_id' => 'integer',
        'dedicacion_id' => 'integer',

        'dicto_cursos_grado' => 'boolean',
        'dicto_cursos_grado_detalle' => 'string',

        'participo_jurado_grado',
        'participo_jurado_grado_detalle',

        'participo_jurado_titular' => 'boolean',
        'participo_jurado_titular_detalle' => 'string',

        'designado_jurado_suplente' => 'boolean',
        'designado_jurado_suplente_detalle' => 'string',

        'jurado_titular_concursos' => 'boolean',
        'jurado_titular_concursos_detalle' => 'string',

        'designado_jurado_suplente_concursos' => 'boolean',
        'designado_jurado_suplente_concursos_detalle' => 'string',

        'participo_armado_aula_virtual' => 'boolean',

        'participo_elaboracion_propuesta_innovadora' => 'boolean',
        'participo_elaboracion_propuesta_innovadora_detalle' => 'string',

        'elaboro_material_didactico' => 'boolean',
        'elaboro_material_didactico_detalle' => 'string',

        'participo_dictado_cursos' => 'boolean',
        'participo_dictado_cursos_detalle' => 'string',

        'formo_parte_comite_carrera_posgrado' => 'boolean',
        'formo_parte_comite_carrera_posgrado_detalle' => 'string',

        'docente_estable_carrera_posgrado' => 'boolean',
        'docente_estable_carrera_posgrado_detalle' => 'string',

        'participo_supervision_tesis_posgrado' => 'boolean',
        'participo_supervision_tesis_posgrado_detalle' => 'string',

        'jurado_tesis_grado' => 'boolean',
        'jurado_tesis_grado_detalle' => 'string',

        'coordino_curso_posgrado' => 'boolean',
        'coordino_curso_posgrado_detalle' => 'string',

        'dicto_cursos_profesional' => 'boolean',
        'dicto_cursos_profesional_detalle' => 'string',

        'otras_actividades_posgrado' => 'string',

        'dirigio_tesinas_grado' => 'boolean',
        'dirigio_tesinas_grado_detalle' => 'string',

        'dirigio_pps' => 'boolean',
        'dirigio_pps_detalle' => 'string',

        'dirigio_frh_estudiantiles' => 'boolean',
        'dirigio_frh_estudiantiles_detalle' => 'string',

        'dirigio_frh_profesionales' => 'boolean',
        'dirigio_frh_profesionales_detalle' => 'string',

        'dirigio_pasantias_estudiantes' => 'boolean',
        'dirigio_pasantias_estudiantes_detalle' => 'string',

        'dirigio_pasantias_investigacion' => 'boolean',
        'dirigio_pasantias_investigacion_detalle' => 'string',

        'dirigio_becas' => 'boolean',
        'dirigio_becas_detalle' => 'string',

        'participo_otra_actividad_frh' => 'boolean',
        'participo_otra_actividad_frh_detalle' => 'string',

        'dirige_proyectos_investigacion' => 'boolean',
        'dirige_proyectos_investigacion_detalle' => 'string',

        'participa_investigador' => 'boolean',
        'participa_investigador_detalle' => 'string',

        'categoria_incentivo' => 'string',

        'miembro_conicet' => 'boolean',
        'miembro_conicet_detalle' => 'string',

        'parte_instituto_investigacion' => 'boolean',
        'parte_instituto_investigacion_detalle' => 'string',

        'recibio_premio_investigacion' => 'boolean',
        'recibio_premio_investigacion_detalle' => 'string',

        'realiazo_viajes_investigacion' => 'boolean',
        'realiazo_viajes_investigacion_detalle' => 'string',

        'realiazo_viajes_campo' => 'boolean',
        'realiazo_viajes_campo_detalle' => 'string',

        'participo_congresos_cientifica' => 'boolean',
        'participo_congresos_cientifica_detalle' => 'string',

        'mensione_produccion_cientifica' => 'string',
        'actividades_investigacion_relevante' => 'string',

        'miembro_consejo_directivo' => 'boolean',
        'miembro_consejo_directivo_detalle' => 'string',

        'estamento_consejo_directivo_id' => 'integer',

        'miembro_consejo_posgrado' => 'boolean',
        'miembro_consejo_departamento' => 'boolean',
        'miembro_consejo_departamento_detalle' => 'string',

        'represento_facultad' => 'boolean',
        'represento_facultad_detalle' => 'string',

        'miembro_comisiones_institucionales' => 'boolean',
        'miembro_comisiones_institucionales_detalle' => 'string',

        'participo_organizacion_eventos_cientificos' => 'boolean',
        'participo_organizacion_eventos_cientificos_detalle' => 'string',

        'participo_cargos_directivos' => 'boolean',
        'participo_cargos_directivos_detalle' => 'string',

        'participo_cargos_gestion' => 'boolean',
        'participo_cargos_gestion_detalle' => 'string',

        'participo_actividades_gestion' => 'boolean',
        'participo_actividades_gestion_detalle' => 'string',

        'dicto_charlas_conferencias' => 'boolean',
        'dicto_charlas_conferencias_detalle' => 'string',

        'participo_asesoramiento_cientifico' => 'boolean',
        'participo_asesoramiento_cientifico_detalle' => 'string',

        'elaboro_materiales_extension' => 'boolean',
        'elaboro_materiales_extension_detalle' => 'string',

        'participo_difusion_carreras' => 'boolean',
        'participo_difusion_carreras_detalle' => 'string',

        'participo_tarea_extension' => 'boolean',
        'participo_tarea_extension_detalle' => 'string',

        'realizo_prestacion_servicios' => 'boolean',
        'realizo_prestacion_servicios_detalle' => 'string',

        'realizo_infromes_tecnicos_empresas' => 'boolean',
        'realizo_infromes_tecnicos_empresas_detalle' => 'string',

        'tomo_cursos_posgrado' => 'boolean',
        'tomo_cursos_posgrado_detalle' => 'string',

        'curso_carrera_posgrado' => 'boolean',
        'curso_carrera_posgrado_detalle' => 'string',

        'realizo_trayecto_academico' => 'boolean',
        'realizo_trayecto_academico_detalle' => 'string',

        'obtuvo_beca_formacion_profesional' => 'boolean',
        'obtuvo_beca_formacion_profesional_detalle' => 'string',

        'observaciones' => 'string',
        'observaciones_revision' => 'string',

        'presentado_at' => 'datetime',
        'revisado_at' => 'datetime',

        'estado_id' => 'integer',

        'describa_actividades_asignaturas'=> 'string',
        'dirigio_tesis' => 'boolean',
        'dirigio_tesis_detalle'=> 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function dedicacion()
    {
        return $this->belongsTo(Dedicacion::class);
    }

    public function situacion_cargo()
    {
        return $this->belongsTo(SituacionCargo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }


}
