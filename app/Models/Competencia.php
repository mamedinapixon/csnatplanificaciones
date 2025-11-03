<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;

    protected $table = 'competencias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'carrera_id'
    ];

    /**
     * Get the temas that belong to the Competencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'tema_competencia');
    }

    /**
     * Get the carrera that owns the Competencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}