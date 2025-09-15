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
            // Campos para citas de pacientes (opcionales)
            $table->string('nombre_paciente', 100)->nullable()->after('id_paciente');
            $table->string('apellido_pat_paciente', 100)->nullable()->after('nombre_paciente');
            $table->string('apellido_mat_paciente', 100)->nullable()->after('apellido_pat_paciente');
            $table->text('direccion_paciente')->nullable()->after('apellido_mat_paciente');
            $table->string('correo_paciente', 150)->nullable()->after('direccion_paciente');
            $table->text('motivo_consulta')->nullable()->after('correo_paciente');
            $table->enum('estado_cita', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente')->after('motivo_consulta');
            $table->boolean('es_cita_paciente')->default(false)->after('estado_cita');
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
