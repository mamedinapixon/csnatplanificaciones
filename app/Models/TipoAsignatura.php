<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAsignatura extends Model
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
     * Get all of the planificaciones for the TipoAsignatura
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planificaciones()
    {
        return $this->hasMany(Planificacion::class);
    }

}
