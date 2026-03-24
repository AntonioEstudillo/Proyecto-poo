<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\MembresiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes',[ClienteController::class,'index'])->name('clientes.index');
Route::get('/clientes/create',[ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store',[ClienteController::class,'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');


Route::get('/membresias',[MembresiaController::class,'index'])->name('membresias.index');
Route::get('/membresias/create',[MembresiaController::class,'create'])->name('membresias.create');
Route::post('/membresias/store',[MembresiaController::class,'store'])->name('membresias.store');
Route::get('/membresias/{membresia}/edit',[MembresiaController::class,'edit'])->name('membresias.edit');
Route::put('/membresias/{membresia}',[MembresiaController::class, 'update'])->name('membresias.update');
Route::delete('/membresias/{membresia}',[MembresiaController::class, 'destroy'])->name('membresias.destroy');

Route::get('/asistencias',[AsistenciaController::class,'index'])->name('asistencias.index');
Route::get('/asistencias/create',[AsistenciaController::class,'create'])->name('asistencias.create');

Route::get('/entrenadores', [EntrenadorController::class,'index'])->name('entrenadores.index');
Route::get('/entrenadores/create', [EntrenadorController::class,'create'])->name('entrenadores.create');
Route::post('/entrenadores/store', [EntrenadorController::class,'store'])->name('entrenadores.store');
Route::get('/entrenadores/{entrenador}/edit', [EntrenadorController::class,'edit'])->name('entrenadores.edit');
Route::put('/entrenadores/{entrenador}',[EntrenadorController::class, 'update'])->name('entrenadores.update');
Route::delete('/entrenadores/{entrenador}',[EntrenadorController::class, 'destroy'])->name('entrenadores.destroy');


