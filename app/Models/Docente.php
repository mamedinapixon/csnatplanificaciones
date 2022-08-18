<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'Apellido',
        'Nombre',
        'tipo_documento_id',
        'nro_documento'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'user_id' => 'integer',
        'Apellido' => 'string',
        'Nombre' => 'string',
        'tipo_documento_id' => 'integer',
        'nro_documento' => 'string'
    ];

    /**
     * Get all of the planificaciones for the Docente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planificacionesCargo()
    {
        return $this->hasMany(Planificacion::class);
    }
    public function planificacionesParticipa()
    {
        return $this->belongsToMany(Planificacion::class, 'docente_planificacions')->withPivot('cargo_id');
    }


}
