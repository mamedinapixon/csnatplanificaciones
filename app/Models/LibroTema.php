<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroTema extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libro_temas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'planificacion_id',
        'fecha',
        'contenido',
        'cantidad_alumnos',
        'duracion_minutos',
        'unidad',
        'Observaciones'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date',
        'cantidad_alumnos' => 'integer',
        'duracion_minutos' => 'integer',
        'unidad' => 'integer'
    ];

    /**
     * Relationship with Planificacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class, 'planificacion_id');
    }

    // Relación muchos a muchos con CaracterClase
    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_libro_tema');
    }
    public function caracteres()
    {
        return $this->belongsToMany(CaracterClase::class, 'caracter_libro_tema');
    }
    public function modalidades()
    {
        return $this->belongsToMany(ModalidadClase::class, 'modalidad_libro_tema');
    }
}
