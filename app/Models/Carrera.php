<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'codigo_siu',
        'plan_anio',
        'nombre_reducido',
        'estado_id'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'nombre' => 'string',
        'codigo_siu' => 'string',
        'plan_anio' => 'integer',
        'nombre_reducido' => 'string',
        'estado_id' => 'integer'
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
