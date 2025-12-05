<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatedraMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'catedra_id',
        'user_id',
        'role',
        'fecha_inicio',
        'fecha_fin',
        'activo',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean',
    ];

    /**
     * Relación con la cátedra
     */
    public function catedra(): BelongsTo
    {
        return $this->belongsTo(Catedra::class);
    }

    /**
     * Relación con el usuario
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Verificar si es jefe de cátedra
     */
    public function esJefe(): bool
    {
        return $this->role === 'jefe';
    }

    /**
     * Verificar si es miembro de cátedra
     */
    public function esMiembro(): bool
    {
        return $this->role === 'miembro';
    }

    /**
     * Scope para filtrar miembros activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para filtrar jefes de cátedra
     */
    public function scopeJefes($query)
    {
        return $query->where('role', 'jefe');
    }

    /**
     * Scope para filtrar miembros regulares
     */
    public function scopeMiembros($query)
    {
        return $query->where('role', 'miembro');
    }
}
