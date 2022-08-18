<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocentePlanificacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'planificacion_id',
        'docente_id',
        'cargo_id'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'planificacion_id' => 'integer',
        'docente_id' => 'integer',
        'cargo_id' => 'integer'
    ];
}
