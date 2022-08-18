<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPlanEstudio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'carrera_id',
        'materia_id',
        'anio_curdada',
        'periodo_academico_id'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'carrera_id' => 'integer',
        'materia_id' => 'integer',
        'anio_curdada' => 'integer',
        'periodo_academico_id' => 'integer'
    ];

    /**
     * Get all of the planificaciones for the MateriaPlanEstudio
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planificaciones()
    {
        return $this->hasMany(Planificacion::class);
    }
    /**
     * Get the carrera that owns the MateriaPlanEstudio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    /**
     * Get the materia that owns the MateriaPlanEstudio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    /**
     * Get the periodoAcademico that owns the MateriaPlanEstudio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class);
    }




}
