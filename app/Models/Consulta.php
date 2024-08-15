<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'motivo_consulta',
        'notas_padecimiento',
        'edad',
        'talla',
        'temperatura',
        'peso',
        'frecuencia_cardiaca',
        'alergias',
        'diagnostico',
        'solicitar_estudios',
        'indicaciones_estudios',
        'medicacion',
        'cantidad',
        'frecuencia',
        'duracion',
        'notas_receta',
    ];

    protected $casts = [
        'solicitar_estudios' => 'array',
        'indicaciones_estudios' => 'array',
        'medicacion' => 'array',
        'cantidad' => 'array',
        'frecuencia' => 'array',
        'duracion' => 'array',
    ];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_id');
    }
}
