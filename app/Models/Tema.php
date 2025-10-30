<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $table = 'temas';

    protected $fillable = [
        'unidad_id',
        'nombre',
        'detalle'
    ];

    /**
     * Get the unidad that owns the Tema
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    /**
     * Get the competencias that belong to the Tema
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function competencias()
    {
        return $this->belongsToMany(Competencia::class, 'tema_competencia');
    }
}