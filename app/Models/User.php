<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'google_token',
        'microsoft_id',
        'microsoft_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Relación con las cátedras donde es jefe
     */
    public function catedrasJefe()
    {
        return $this->hasMany(Catedra::class, 'jefe_catedra_id');
    }

    /**
     * Relación con las cátedras donde es miembro (no jefe)
     */
    public function catedrasMiembro()
    {
        return $this->hasManyThrough(Catedra::class, CatedraMember::class, 'user_id', 'id', 'id', 'catedra_id')
                    ->where('catedra_members.role', 'miembro')
                    ->where('catedra_members.activo', true);
    }

    /**
     * Relación con todas las cátedras donde participa (jefe o miembro)
     */
    public function catedras()
    {
        return Catedra::where('jefe_catedra_id', $this->id)
                    ->orWhereHas('miembros', function($query) {
                        $query->where('user_id', $this->id)
                              ->where('activo', true);
                    });
    }

    /**
     * Obtener IDs de usuarios que puede ver (miembros de sus cátedras)
     */
    public function getCatedraMemberIdsAttribute()
    {
        // Obtener las cátedras donde es jefe
        $catedraIds = $this->catedrasJefe()->pluck('id');
        
        return CatedraMember::whereIn('catedra_id', $catedraIds)
                           ->where('activo', true)
                           ->where('role', 'miembro')
                           ->pluck('user_id')
                           ->unique();
    }

    /**
     * Verificar si es jefe de alguna cátedra
     */
    public function esJefeCatedra(): bool
    {
        return Catedra::where('jefe_catedra_id', $this->id)->exists();
    }

    /**
     * Verificar si puede ver la asistencia de un usuario específico
     */
    public function puedeVerAsistenciaDe(User $user): bool
    {
        // Si tiene el permiso global
        if ($this->can('ver historial asistencia')) {
            return true;
        }
        
        // Si es el mismo usuario
        if ($this->id === $user->id) {
            return true;
        }
        
        // Si es jefe de alguna cátedra donde el usuario es miembro
        $catedrasDondeEsJefe = $this->catedrasJefe;
        foreach ($catedrasDondeEsJefe as $catedra) {
            if ($catedra->esMiembro($user)) {
                return true;
            }
        }
        
        return false;
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole('admin');
    }
}
