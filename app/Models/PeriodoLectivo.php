<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class PeriodoLectivo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'anio_academico',
        'periodo_academico_id',
        'fecha_inicio_activo',
        'fecha_fin_activo'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'anio_academico' => 'integer',
        'periodo_academico_id' => 'integer',
        'fecha_inicio_activo' => 'date',
        'fecha_fin_activo' => 'date'
    ];

    protected $dates = ['fecha_inicio_activo','fecha_fin_activo'];


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
        return "{$this->anio_academico} {$this->periodo_academico_id}";
    }
}
