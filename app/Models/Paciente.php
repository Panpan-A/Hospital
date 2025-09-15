<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_paciente';
    protected $fillable = [
        'nss',
        'apellido_pat',
        'apellido_mat',
        'nombre',
        'fecha',

    ];

    public function consultas() {
        return $this->hasMany(Consulta::class, 'id_paciente');
    }
    public function tarjetas() {
        return $this->hasMany(Tarjeta::class, 'id_paciente');
    }
    public function pacienteCamas() {
        return $this->hasMany(PacienteCama::class, 'id_paciente');
    }
}
