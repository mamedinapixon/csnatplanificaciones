<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class DocentePlanificacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'planificacion_id',
        'docente_id',
        'cargo_id',
        'dedicacion_id',
        'situacion_cargos_id'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'planificacion_id' => 'integer',
        'docente_id' => 'integer',
        'cargo_id' => 'integer',
        'dedicacion_id' => 'integer',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    public function dedicacion()
    {
        return $this->belongsTo(Dedicacion::class);
    }
    public function situacion()
    {
        return $this->belongsTo(SituacionCargo::class,'situacion_cargos_id');
    }
}
