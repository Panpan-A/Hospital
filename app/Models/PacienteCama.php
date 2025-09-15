<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteCama extends Model
{
    use HasFactory;
    protected $table = 'paciente_camas';
    protected $fillable = [
        'id_paciente',
        'id_cama',
        'fecha_ingreso',
        'fecha_egreso',
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    public function cama() {
        return $this->belongsTo(Cama::class, 'id_cama');
    }
}
