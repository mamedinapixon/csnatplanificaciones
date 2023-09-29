<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'fecha_at',
        'ingreso_at',
        'salida_at',
        'ubicacion_id',
        'otra_ubicacion',
        'observacion'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'fecha_at' => 'datetime:Y-m-d',
        'ingreso_at' => 'datetime:Y-m-d\TH:i',
        'salida_at' => 'datetime:Y-m-d\TH:i'
    ];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
