<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MemoriaAsignatura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'memorias_asignaturas';

    protected $fillable = [
        'memoria_id',
        'materia_id',
        'asignatura',
        'tipo_docente', //Estable o invitado
        'cargo_id',
        'dedicacion_id',
        'situacion_cargo_id',

    ];

    protected $guarded = ['id'];

    protected $casts = [
        'memoria_id' => 'integer',
        'materia_id' => 'integer',
        'asignatura' => 'string',
        'tipo_docente' => 'string',
        'cargo_id' => 'integer',
        'dedicacion_id' => 'integer',
        'situacion_cargo_id' => 'integer',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function dedicacion()
    {
        return $this->belongsTo(Dedicacion::class);
    }

    public function situacion_cargo()
    {
        return $this->belongsTo(SituacionCargo::class);
    }
}
