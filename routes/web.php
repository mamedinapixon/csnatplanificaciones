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
//use App\Http\Controllers\DocentePlanificacionController;
//use App\Http\Controllers\ModalidadController;
//use App\Http\Controllers\PeriodoAcademicoController;
//use App\Http\Controllers\TipoAsignaturaController;

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:ver docentes'
])->group(function () {
    Route::resource('/admin/docente', DocenteController::class);
});

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
