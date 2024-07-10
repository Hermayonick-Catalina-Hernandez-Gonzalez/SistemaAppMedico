<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'nombre',
        'descripcion',
        'precio',
        'medico_nombre',
    ];

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico_nombre');
    }
}
