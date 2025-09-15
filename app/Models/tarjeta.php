<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tarjeta';
    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'id_paciente',
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
