<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cama';
    protected $fillable = ['id_planta'];

    public function planta() {
        return $this->belongsTo(Planta::class, 'id_planta');
    }
    public function pacienteCamas() {
        return $this->hasMany(PacienteCama::class, 'id_cama');
    }
}
