<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class memorias_asignatura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'memoria_id',
        'materia_id',
        'asignatura',
        'tipo_docente'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'memoria_id' => 'integer',
        'materia_id' => 'integer',
        'asignatura' => 'string',
        'tipo_docente' => 'string',
    ];
}
