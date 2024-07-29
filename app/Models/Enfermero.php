<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermero extends Model
{
    use HasFactory;

    protected $table = 'enfermeros';

    /**
     * 
     * The attributes that are mass asignable.
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
}
