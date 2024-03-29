<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Planificacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'periodo_lectivo_id',
        'docente_id',
        'cargo_id',
        'dedicacion_id',
        'situacion_cargo_id',
        'materia_plan_estudio_id',
        'auxiliar_docente_estudiantil',
        'auxiliar_docente_estudiantil_detalle',
        'formacion_recurso_humano',
        'formacion_recurso_humano_detalle',
        'electiva_nombre',
        'doc_invitados',
        'doc_invitados_detalles',
        'tipo_asignatura_id',
        'carga_horaria',
        'modalidad_dictado_teoriacas_id',
        'modalidad_dictado_practicas_id',
        'carga_horaria_semanal_practica',
        'carga_horaria_semanal_practica_teorica',
        'carga_horaria_semanal_teorica',
        'practicos_aprobacion_abligatoria',
        'practicos_aprobacion_abligatoria_detalle',
        'cantidad_parciales',
        'modalidad_parciales_id',
        'salida_campo',
        'correo_responsable_viaje',
        'salida_campo',
        'salida_campo_cantidad',
        'salida_campo_conjuntas',
        'salida_campo_catedras',
        'actividades_conjuntas',
        'actividades_conjuntas_catedras',
        'actividades_conjuntas_tipo',
        'actividades_complementarias',
        'actividades_complementarias_tipo',
        'aula_virtual',
        'aula_virtual_complemento_dictado',
        'herramientas_virtuales',
        'herramientas_virtuales_previstas',
        'necesidades',
        'observacioens_sugerencias',
        'observaciones_comision',
        'estado_id',
        'presentado_at',
        'revisado_at',
        'urlprograma'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'user_id' => 'integer',
        'periodo_lectivo_id' => 'integer',
        'docente_id' => 'integer',
        'cargo_id' => 'integer',
        'dedicacion_id' => 'integer',
        'situacion_cargo_id' => 'integer',
        'materia_plan_estudio_id' => 'integer',
        'electiva_nombre' => 'string',
        'doc_invitados' => 'boolean',
        'tipo_asignatura_id' => 'integer',
        'carga_horaria' => 'integer',
        'modalidad_dictado_teoriacas_id' => 'integer',
        'modalidad_dictado_practicas_id' => 'integer',
        'carga_horaria_semanal_practica' => 'integer',
        'carga_horaria_semanal_practica_teorica' => 'integer',
        'carga_horaria_semanal_teorica' => 'integer',
        'cantidad_parciales' => 'integer',
        'modalidad_parciales_id' => 'integer',
        'salida_campo' => 'boolean',
        'salida_campo_cantidad' => 'integer',
        'salida_campo_conjuntas' => 'boolean',
        'salida_campo_catedras' => 'string',
        'actividades_conjuntas' => 'boolean',
        'actividades_conjuntas_catedras' => 'string',
        'actividades_conjuntas_tipo' => 'string',
        'actividades_complementarias' => 'boolean',
        'actividades_complementarias_tipo' => 'string',
        'aula_virtual' => 'boolean',
        'aula_virtual_complemento_dictado' => 'boolean',
        'herramientas_virtuales' => 'boolean',
        'herramientas_virtuales_previstas' => 'string',
        'necesidades' => 'string',
        'observacioens_sugerencias' => 'string',
        'observaciones_comision' => 'string',
        'estado_id' => 'integer',
        'presentado_at' => 'datetime',
        'revisado_at' => 'datetime',
        'urlprograma' => 'string',
    ];


    /**
     * Get the MateriaPlanEstudio that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiaPlanEstudio()
    {
        return $this->belongsTo(MateriaPlanEstudio::class);
    }
    /**
     * Get the Docente that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docenteCargo()
    {
        return $this->belongsTo(Docente::class, "docente_id");
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, "cargo_id");
    }
    public function dedicacion()
    {
        return $this->belongsTo(Dedicacion::class, "dedicacion_id");
    }
    public function situacion()
    {
        return $this->belongsTo(SituacionCargo::class, "situacion_cargo_id");
    }
    /**
     * Get the TipoAsignatura that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoAsignatura()
    {
        return $this->belongsTo(TipoAsignatura::class);
    }
    /**
     * Get the ModalidadDictadoTeoricas that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalidadDictadoTeorica()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_dictado_teoriacas_id');
    }
    /**
     * Get the ModalidadDictadoPracticas that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalidadDictadoPractica()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_dictado_practicas_id');
    }
    /**
     * Get the ModalidadParciales that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalidadParcial()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_parciales_id');
    }
    /**
     * Get all of the salidas for the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salidas()
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }
    /**
     * The roles that belong to the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_planificacions')->withPivot('cargo_id');
    }
    /**
     * Get the periodoLectivo that owns the Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoLectivo()
    {
        return $this->belongsTo(PeriodoLectivo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function total_por_carrera()
    {
        $cantMaterias = DB::table('materia_plan_estudios')
                   ->select('carrera_id', DB::raw('COUNT(materia_id) as cantidad'))
                   //->where('is_published', true)
                   ->groupBy('carrera_id');

        return DB::table('planificacions')
        ->distinct()
        ->selectRaw('planificacions.materia_plan_estudio_id, carreras.nombre_reducido as carrera, cant_materias.cantidad as cant_materias')
        ->join('materia_plan_estudios', 'materia_plan_estudios.id', '=', 'planificacions.materia_plan_estudio_id')
        ->join('carreras', 'carreras.id', '=', 'materia_plan_estudios.carrera_id')
        ->join('periodo_lectivos', 'periodo_lectivos.id', 'planificacions.periodo_lectivo_id')
        ->joinSub($cantMaterias, 'cant_materias', function ($join) {
            $join->on('carreras.id', '=', 'cant_materias.carrera_id');
        });
    }

}
