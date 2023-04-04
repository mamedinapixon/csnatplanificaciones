<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class AnioAcademico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'planificacion_activo_desde',
        'planificacion_activo_hasta',
        'memoria_activo_desde',
        'memoria_activo_hasta'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'nombre' => 'integer',
        'planificacion_activo_desde' => 'string',
        'planificacion_activo_hasta' => 'string',
        'memoria_activo_desde' => 'string',
        'memoria_activo_hasta' => 'string',
    ];
}
