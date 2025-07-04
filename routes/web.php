<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaPlanEstudioController;
use App\Http\Controllers\PeriodoLectivoController;
use App\Http\Controllers\PlanificacionController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoriaController;
use App\Http\Controllers\AsistenciaController;
//use App\Http\Controllers\DocentePlanificacionController;
//use App\Http\Controllers\ModalidadController;
//use App\Http\Controllers\PeriodoAcademicoController;
//use App\Http\Controllers\TipoAsignaturaController;
use App\Http\Livewire\LibroTema\CargarLibroTema;
use App\Http\Livewire\LibroTema\HistorialLibroTema;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Auth\LoginUserViaSocialiteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Route::get('/', [PlanificacionController::class, 'index']);
    Route::view('/', 'home')->name('home');
    Route::resource('/planificacion', PlanificacionController::class);
    Route::resource('/memoria', MemoriaController::class);
    //Route::resource('/asistencia', AsistenciaController::class);
    Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
    Route::get('/asistencia/historial', [AsistenciaController::class, 'historial'])->name('asistencia.historial');
    Route::get('/librotema', HistorialLibroTema::class)->name('librotema.historial');
    Route::get('/librotema/cargar', CargarLibroTema::class)->name('librotema.cargar');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:ver docentes'
])->group(function () {
    Route::resource('/admin/docente', DocenteController::class);
});

Route::get('/admin/cargar-docentes', [DocenteController::class, 'mostrarFormulario'])->name('docentes.formulario');
Route::post('/admin/cargar-docentes', [DocenteController::class, 'cargarCSV'])->name('docentes.cargar-csv');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:ver periodos lectivos'
])->group(function () {
    Route::resource('/admin/periodoLectivo', PeriodoLectivoController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:ver usuarios'
])->group(function () {
    Route::resource('/admin/user', UserController::class);
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/{provider}/redirect', [LoginUserViaSocialiteController::class, 'create'])->where('provider', 'google|microsoft');
Route::get('auth/{provider}/callback', [LoginUserViaSocialiteController::class, 'store'])->where('provider', 'google|microsoft');

Route::get('planificacion/{planificacion}/pdf', [App\Http\Controllers\PlanificacionController::class, 'generarPdf'])
    ->middleware('auth')
    ->name('planificacion.pdf');
