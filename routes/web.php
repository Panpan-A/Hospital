<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\CamaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\TargetaController;
use App\Http\Controllers\PacienteCamaController;
use App\Http\Controllers\TarjetaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rutas públicas (sin autenticación)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/servicios', function () {
    return view('Servicios');
})->name('servicios');

Route::get('/nosotros', function () {
    return view('Nosotros');
})->name('nosotros');

// Rutas que requieren autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para Médicos
    Route::resource('medicos', MedicoController::class);
    Route::get('/medicos/search', [MedicoController::class, 'search'])->name('medicos.search');

    // Rutas para Pacientes
    Route::resource('pacientes', PacienteController::class);
    Route::get('/pacientes/search', [PacienteController::class, 'search'])->name('pacientes.search');

    // Rutas para Diagnósticos
    Route::resource('diagnosticos', DiagnosticoController::class);

    // Rutas para Camas
    Route::resource('camas', CamaController::class);

    // Rutas para Plantas
    Route::resource('plantas', PlantaController::class);

    // Rutas para Consultas
    Route::resource('consultas', ConsultaController::class);
    
    // Ruta para obtener horarios disponibles
    Route::get('consultas/horarios/disponibles', [ConsultaController::class, 'getHorariosDisponibles'])->name('consultas.horarios.disponibles');
    

    // Rutas para Tarjetas
    Route::resource('targetas', TargetaController::class);

    // Rutas para Paciente-Camas
    Route::resource('paciente-camas', PacienteCamaController::class);

    // Rutas para Tarjetas (duplicado corregido)
    Route::resource('tarjetas', TarjetaController::class);

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';