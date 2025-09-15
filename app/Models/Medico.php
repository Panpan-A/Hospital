<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_medico';
    protected $fillable = [
        'nombre',
        'apellido_pat',
        'apellido_mat',   
            
    ];

    public function consultas() {
        return $this->hasMany(Consulta::class, 'id_medico');
    }
}


