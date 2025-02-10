<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CaracterClaseLibroTema extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caracter_clase_libro_tema';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libro_tema_id',
        'caracter_clase_id'
    ];

    /**
     * Relación con LibroTema
     */
    public function libroTema()
    {
        return $this->belongsTo(LibroTema::class);
    }

    /**
     * Relación con CaracterClase
     */
    public function caracterClase()
    {
        return $this->belongsTo(CaracterClase::class);
    }
}
