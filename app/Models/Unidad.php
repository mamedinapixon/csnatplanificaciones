<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $fillable = [
        'planificacion_id',
        'numero',
        'titulo'
    ];

    protected $casts = [
        'numero' => 'integer',
    ];

    /**
     * Get the planificacion that owns the Unidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class);
    }

    /**
     * Get the temas for the Unidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temas()
    {
        return $this->hasMany(Tema::class)->orderBy('created_at');
    }
}