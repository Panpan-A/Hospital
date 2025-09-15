<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_diagnostico';
    protected $fillable = ['descripcion'];

    public function consultas() {
        return $this->hasMany(Consulta::class, 'id_diagnostico');
    }
}
