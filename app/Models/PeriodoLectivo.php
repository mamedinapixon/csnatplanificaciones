<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PeriodoLectivo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'anio_academico',
        'periodo_academico_id',
        'fecha_inicio_carga_planificaciones',
        'fecha_fin_carga_planificaciones',
        'fecha_inicio_carga_memorias',
        'fecha_fin_carga_memorias'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'anio_academico' => 'integer',
        'periodo_academico_id' => 'integer',
        'fecha_inicio_carga_planificaciones' => 'date',
        'fecha_fin_carga_planificaciones' => 'date',
        'fecha_inicio_carga_memorias' => 'date',
        'fecha_fin_carga_memorias' => 'date'
    ];

    protected $dates = [
        'fecha_inicio_carga_planificaciones',
        'fecha_fin_carga_planificaciones',
        'fecha_inicio_carga_memorias',
        'fecha_fin_carga_memorias'
    ];


    /**
     * Get all of the planificaciones for the PeriodoLectivo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planificaciones()
    {
        return $this->hasMany(Planificacion::class);
    }
    /**
     * Get the periodoAcademico that owns the PeriodoLectivo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class);
    }

    public function getFullPeriodoLectivoAttribute()
    {
        return "{$this->anio_academico} {$this->periodoAcademico->nombre}";
    }


    public function onlyYears()
    {
        return DB::table('periodo_lectivos')->distinct()->select('anio_academico')->orderBy('anio_academico', 'desc');
    }

}
