<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Get all of the materiaPlanEstudio for the PeriodoAcademico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiasPlanEstudio()
    {
        return $this->hasMany(MateriaPlanEstudio::class);
    }
    /**
     * Get all of the periodoLectivo for the PeriodoAcademico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodosLectivo()
    {
        return $this->hasMany(PeriodoLectivo::class);
    }
}
