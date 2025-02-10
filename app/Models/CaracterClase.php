<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaracterClase extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    /**
     * Get the LibroTema records associated with the TipoClase.
     */
    public function libroTemas(): HasMany
    {
        return $this->hasMany(LibroTema::class);
    }
}
