<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Constantes de roles
    const ROL_PACIENTE = 'Paciente';
    const ROL_MEDICO = 'Medico';
    const ROL_SECRETARIO = 'Secretario';
    const ROL_ADMIN = 'Admin';

    /**
     * The attributes that are mass assignable.
     *
     * //@var array<int, string>
     * @param string $rol
     * @return bool
     */

    public function hasRole(string $rol)
    {
       return $this->rol === $rol;
    }

    /**
        * Determinar si un usuario es médico
    */

    public function isMedico()
    {
        return $this->hasRole(self::ROL_MEDICO);
    }

    /**
     * Determinar si un usuario es secreario
     */

    public function isSecretario()
    {
        return $this->hasRole(self::ROL_SECRETARIO);
    }

    /**
     * Determinar si un usuario es paciente
     */

    public function isPaciente()
    {
        return $this->hasRole(self::ROL_PACIENTE);
    }

    /**
     * Determinar si un usuario es administrador
     */
    public function isAdmin()
    {
        return $this->hasRole(self::ROL_ADMIN);
    }


    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
