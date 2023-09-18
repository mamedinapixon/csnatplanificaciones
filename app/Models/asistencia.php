<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class asistencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'docnete_id',
        'fecha_at',
        'ingreso_at',
        'salida_at',
        'lugar_id',
        'otro_lugar',
        'observacion'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'fecha_at' => 'datetime:Y-m-d',
        'ingreso_at' => 'datetime:Y-m-d',
        'salida_at' => 'datetime:Y-m-d'
    ];
}
