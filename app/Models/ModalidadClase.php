<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModalidadClase extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * Get the LibroTemas associated with the ModalidadClase.
     */
    public function libroTemas(): HasMany
    {
        return $this->hasMany(LibroTema::class);
    }
}
