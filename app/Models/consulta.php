<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Consulta extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_consulta';
    protected $fillable = [
        'id_paciente', 'id_medico', 'id_diagnostico', 'fecha', 'hora',
        'nombre_paciente', 'apellido_pat_paciente', 'apellido_mat_paciente',
        'direccion_paciente', 'correo_paciente', 'motivo_consulta', 
        'estado_cita', 'es_cita_paciente'
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    public function medico() {
        return $this->belongsTo(Medico::class, 'id_medico');
    }
    public function diagnostico() {
        return $this->belongsTo(Diagnostico::class, 'id_diagnostico');
    }

    /**
     * Obtener el nombre completo del paciente de la cita
     */
    public function getNombreCompletoPacienteAttribute()
    {
        if (isset($this->es_cita_paciente) && $this->es_cita_paciente) {
            return trim(($this->nombre_paciente ?? '') . ' ' . ($this->apellido_pat_paciente ?? '') . ' ' . ($this->apellido_mat_paciente ?? ''));
        }
        return $this->paciente ? $this->paciente->nombre . ' ' . $this->paciente->apellido_pat . ' ' . $this->paciente->apellido_mat : '';
    }

    /**
     * Verificar si el horario está disponible para citas de pacientes
     */
    public static function isHorarioDisponibleParaCita($fecha, $hora)
    {
        if (!Schema::hasColumn('consultas', 'es_cita_paciente')) {
            // Si los campos no existen, verificar solo fecha y hora
            return !self::where('fecha', $fecha)
                       ->where('hora', $hora)
                       ->exists();
        }
        
        return !self::where('fecha', $fecha)
                   ->where('hora', $hora)
                   ->where('es_cita_paciente', true)
                   ->whereIn('estado_cita', ['pendiente', 'confirmada'])
                   ->exists();
    }

    /**
     * Obtener horarios disponibles para una fecha específica
     */
    public static function getHorariosDisponiblesParaCita($fecha)
    {
        if (!Schema::hasColumn('consultas', 'es_cita_paciente')) {
            // Si los campos no existen, generar horarios básicos
            $horariosDisponibles = [];
            for ($hora = 8; $hora < 18; $hora++) {
                $horariosDisponibles[] = sprintf('%02d:00', $hora);
            }
            return $horariosDisponibles;
        }

        $horariosOcupados = self::where('fecha', $fecha)
                               ->where('es_cita_paciente', true)
                               ->whereIn('estado_cita', ['pendiente', 'confirmada'])
                               ->pluck('hora')
                               ->toArray();

        $horariosDisponibles = [];
        $horaInicio = 8; // 8:00 AM
        $horaFin = 18;   // 6:00 PM
        
        for ($hora = $horaInicio; $hora < $horaFin; $hora++) {
            $horaFormateada = sprintf('%02d:00', $hora);
            if (!in_array($horaFormateada, $horariosOcupados)) {
                $horariosDisponibles[] = $horaFormateada;
            }
        }
        
        return $horariosDisponibles;
    }

    /**
     * Scope para citas de pacientes
     */
    public function scopeCitasPacientes($query)
    {
        if (Schema::hasColumn('consultas', 'es_cita_paciente')) {
            return $query->where('es_cita_paciente', true);
        }
        return $query->where('id', 0); // No hay citas si no existe el campo
    }

    /**
     * Scope para consultas médicas normales
     */
    public function scopeConsultasMedicas($query)
    {
        if (Schema::hasColumn('consultas', 'es_cita_paciente')) {
            return $query->where('es_cita_paciente', false);
        }
        return $query; // Todas son consultas médicas si no existe el campo
    }
}
