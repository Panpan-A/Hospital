<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            // Verificar si las columnas ya existen antes de agregarlas
            if (!Schema::hasColumn('consultas', 'nombre_paciente')) {
                $table->string('nombre_paciente', 100)->nullable();
            }
            if (!Schema::hasColumn('consultas', 'apellido_pat_paciente')) {
                $table->string('apellido_pat_paciente', 100)->nullable();
            }
            if (!Schema::hasColumn('consultas', 'apellido_mat_paciente')) {
                $table->string('apellido_mat_paciente', 100)->nullable();
            }
            if (!Schema::hasColumn('consultas', 'direccion_paciente')) {
                $table->text('direccion_paciente')->nullable();
            }
            if (!Schema::hasColumn('consultas', 'correo_paciente')) {
                $table->string('correo_paciente', 150)->nullable();
            }
            if (!Schema::hasColumn('consultas', 'motivo_consulta')) {
                $table->text('motivo_consulta')->nullable();
            }
            if (!Schema::hasColumn('consultas', 'estado_cita')) {
                $table->enum('estado_cita', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');
            }
            if (!Schema::hasColumn('consultas', 'es_cita_paciente')) {
                $table->boolean('es_cita_paciente')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropColumn([
                'nombre_paciente',
                'apellido_pat_paciente', 
                'apellido_mat_paciente',
                'direccion_paciente',
                'correo_paciente',
                'motivo_consulta',
                'estado_cita',
                'es_cita_paciente'
            ]);
        });
    }
};
