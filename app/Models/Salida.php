<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'planificaicon_id',
        'nombre',
        'dias_tentativos',
        'fecha_tentativa'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'planificaicon_id' => 'integer',
        'nombre' => 'string',
        'dias_tentativos' => 'integer',
        'fecha_tentativa' => 'string'
    ];

    /**
     * Get the planificacion that owns the Salida
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planificacion()
    {
        return $this->belongsTo(Planificacion::class);
    }
}
