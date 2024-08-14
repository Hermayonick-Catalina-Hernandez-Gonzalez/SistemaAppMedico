<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cita extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'pacientes',
        'hora',
        'fecha',
        'servicio',
        'medico_id',
        'Descripcion',
    ];

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'pacientes');
    }
}
