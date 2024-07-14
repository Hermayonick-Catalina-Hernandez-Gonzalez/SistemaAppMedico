<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    
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
}
