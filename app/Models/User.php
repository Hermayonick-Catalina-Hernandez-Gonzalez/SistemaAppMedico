<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Constantes de roles
    const ROL_MEDICO = 'Medico';
    const ROL_SECRETARIO = 'Secretario';
    const ROL_ADMIN = 'Admin';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'telefono',
        'email',
        'password',
        'role',
    ];

    /**
     * The attriburtes that should be hidden for arrays.
     * 
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function medico()
    {
        return $this->hasOne(Medico::class);
    }

    public function secretario()
    {
        return $this->hasOne(Secretario::class);
    }

    /**
     * Check if user has a specific role.
     * 
     * @param string $role
     * @return bool
     */
    
    public function hasRole(string $role)
    {
       return $this->role === $role;
    }

    /**
     * Determinar si un usuario es medico
     * 
     * @return bool
     */

    public function isMedico()
    {
        return $this->hasRole(self::ROL_MEDICO);
    }

    /**
     * Determinar si un usuario es secretario
     * 
     * @return bool
     */

    public function isSecretario()
    {
        return $this->hasRole(self::ROL_SECRETARIO);
    }

    /**
     * Determinar si un usuario es administrador
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole(self::ROL_ADMIN);
    }

}
