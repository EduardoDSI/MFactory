<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RegistroAsistenciaController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('persona', [PersonaController::class, 'index'])->name('persona');
//Route::get('/persona/create', [PersonaController::class, 'create'])->name('persona.create');
Route::post('/persona/store', [PersonaController::class, 'store'])->name('persona.store');
//Route::get('/persona/{id}/edit', [PersonaController::class, 'edit'])->name('persona.edit');
//Route::put('/persona/{id}/update', [PersonaController::class, 'update'])->name('persona.update');
//Route::post('/persona/update', [PersonaController::class, 'update'])->name('persona.update');
Route::post('/persona/update/{id}', [PersonaController::class, 'update'])->name('persona.update');
//Route::get('/persona/{id}/delete', [PersonaController::class, 'delete'])->name('persona.delete');
//Route::delete('/persona/{id}/destroy', [PersonaController::class, 'destroy'])->name('persona.destroy');
Route::delete('/persona/delete/{id}', [PersonaController::class, 'delete'])->name('persona.delete');




