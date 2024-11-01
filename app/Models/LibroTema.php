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
        'modalidad',
        'caracter',
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
        'modalidad' => 'array',
        'caracter' => 'array',
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

    /**
     * Getter for modalidad as collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function getModalidadAttribute($value)
    {
        return collect(json_decode($value, true));
    }

    /**
     * Getter for caracter as collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCaracterAttribute($value)
    {
        return collect(json_decode($value, true));
    }

    /**
     * Custom method to add modalidad
     *
     * @param array|int $modalidad
     * @return self
     */
    public function addModalidad($modalidad)
    {
        $current = $this->modalidad ?? [];
        $newModalidad = is_array($modalidad) ? $modalidad : [$modalidad];
        $this->modalidad = array_unique(array_merge($current, $newModalidad));
        return $this;
    }

    /**
     * Custom method to add caracter
     *
     * @param array|int $caracter
     * @return self
     */
    public function addCaracter($caracter)
    {
        $current = $this->caracter ?? [];
        $newCaracter = is_array($caracter) ? $caracter : [$caracter];
        $this->caracter = array_unique(array_merge($current, $newCaracter));
        return $this;
    }

    // Relación muchos a muchos con CaracterClase
    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_libro_tema');
    }
}
