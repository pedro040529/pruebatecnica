<?php

use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PeliculaTurnoController;

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

// Route::get('/', [PeliculaController::class, 'index'])->name('pelicula.index');

// Route::get('turno/create', [TurnoController::class, 'create'])->name('turno.create');
// Route::post('turno', [TurnoController::class, 'store'])->name('turno.store');
// Route::get('turno/lista', [TurnoController::class, 'index'])->name('turno.index');
// Route::get('turno/{turno}/editar', [TurnoController::class, 'edit'])->name('turno.edit');
// Route::put('turno/{turno}/update', [TurnoController::class, 'update'])->name('turno.update');
// Route::delete('turno/{turno}/eliminar', [TurnoController::class, 'destroy'])->name('turno.destroy');

// Route::get('pelicula/create', [PeliculaController::class, 'create'])->name('pelicula.create');
// Route::post('pelicula', [PeliculaController::class, 'store'])->name('pelicula.store');

// Route::get('pelicula/{pelicula}/editar', [PeliculaController::class, 'edit'])->name('pelicula.edit');
// Route::put('pelicula/{pelicula}', [PeliculaController::class, 'update'])->name('pelicula.update');
// Route::get('pelicula/lista', [PeliculaController::class, 'index'])->name('pelicula.index');
// Route::delete('pelicula/{pelicula}/eliminar', [PeliculaController::class, 'destroy'])->name('pelicula.destroy');
// Route::put('turnosPeliculas/{pelicula}', [PeliculaController::class, 'estado'])->name('pelicula.estado');

// Route::get('turnosPeliculas/lista', [PeliculaTurnoController::class, 'index'])->name('pelicula_turno.index');
// Route::get('turnosPeliculas/{pelicula}/ver', [PeliculaTurnoController::class, 'pelicula'])->name('pelicula_turno.pelicula');
// Route::get('turnosPeliculas/{pelicula}/crear', [PeliculaTurnoController::class, 'crear'])->name('pelicula_turno.crear');
// Route::post('turnosPeliculas', [PeliculaTurnoController::class, 'guardar'])->name('pelicula_turno.guardar');
// Route::get('turnosPeliculas/{pelicula}/cambios', [PeliculaTurnoController::class, 'cambios'])->name('pelicula_turno.cambios');
// Route::delete('turnosPeliculas/{turnoPelicula}/eliminar', [PeliculaTurnoController::class, 'destroy'])->name('pelicula_turno.destroy');


Route::get('{any}', function(){
    return view('welcome');
})->where('any', '.*');