<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Materia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'codigo_siu',
        'nombre',
        'nombre_reducido',
        'tipo_materia'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'codigo_siu' => 'string',
        'nombre' => 'string',
        'nombre_reducido' => 'string',
        'tipo_materia' => 'string'
    ];

    /**
     * Get all of the materiasPlanEstudio for the Carrera
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiasPlanEstudio()
    {
        return $this->hasMany(MateriaPlanEstudio::class);
    }
}
