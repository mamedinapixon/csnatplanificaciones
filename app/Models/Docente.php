<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'apellido',
        'nombre',
        'tipo_documento_id',
        'nro_documento',
        'email',
        'activo',
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'user_id' => 'integer',
        'apellido' => 'string',
        'nombre' => 'string',
        'tipo_documento_id' => 'integer',
        'nro_documento' => 'string',
        'email' => 'string',
        'activo' => 'boolean',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }
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
