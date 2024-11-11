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
        'fecha',
        'contenido',
        'cantidad_alumnos',
        'duracion_minutos',
        'unidad',
        'observaciones'
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

    public function rules()
    {
        return [
            'fecha' => 'required|date',
            'contenido' => 'required|string',
            'cantidad_alumnos' => 'required|integer|min:0',
            'duracion_minutos' => 'required|integer|min:0',
            'observaciones' => 'nullable|string'
        ];
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
    public function planificaciones()
    {
        return $this->belongsToMany(Planificacion::class, 'planificacion_libro_tema');
    }
}
