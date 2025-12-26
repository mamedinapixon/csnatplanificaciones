<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catedra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    /**
     * Relación con todos los miembros de la cátedra
     */
    public function miembros(): HasMany
    {
        return $this->hasMany(CatedraMember::class);
    }

    /**
     * Relación con los usuarios miembros activos de la cátedra
     */
    public function miembrosActivos(): HasMany
    {
        return $this->hasMany(CatedraMember::class)->where('activo', true);
    }

    /**
     * Obtener todos los usuarios que son miembros de esta cátedra
     */
    public function usuarios()
    {
        return $this->hasManyThrough(User::class, CatedraMember::class, 'catedra_id', 'id', 'id', 'user_id');
    }

    /**
     * Obtener todos los usuarios que son miembros activos de esta cátedra
     */
    public function usuariosActivos()
    {
        return $this->hasManyThrough(User::class, CatedraMember::class, 'catedra_id', 'id', 'id', 'user_id')
                    ->where('catedra_members.activo', true);
    }

    /**
     * Verificar si un usuario es jefe de esta cátedra
     */
    public function esJefe(User $user): bool
    {
        return $this->miembros()
            ->where('user_id', $user->id)
            ->where('activo', true)
            ->where('role', 'jefe')
            ->exists();
    }

    /**
     * Verificar si un usuario es miembro de esta cátedra
     */
    public function esMiembro(User $user): bool
    {
        return $this->miembros()->where('user_id', $user->id)->where('activo', true)->exists();
    }

    /**
     * Verificar si un usuario puede ver la asistencia de esta cátedra
     */
    public function puedeVerAsistencia(User $user): bool
    {
        return $this->esJefe($user) || $this->esMiembro($user);
    }

    /**
     * Scope para filtrar cátedras activas
     */
    public function scopeActivas($query)
    {
        return $query->where('activa', true);
    }
}
