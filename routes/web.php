<?php

use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
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
Route::controller(PersonaController::class)->group(function () {
    Route::get('persona', 'index')->name('persona');
    Route::post('/persona/store', 'store')->name('persona.store');
    Route::post('/persona/update/{id}', 'update')->name('persona.update');
    Route::delete('/persona/delete/{id}', 'delete')->name('persona.delete');
});
Route::controller(ProductoController::class)->group(function () {
    Route::get('producto', 'index')->name('producto');
    Route::post('/producto/store', 'store')->name('producto.store');
    Route::post('/producto/update/{id}', 'update')->name('producto.update');
    Route::delete('/producto/delete/{id}', 'delete')->name('producto.delete');
});
Route::controller(InventarioController::class)->group(function () {
    Route::get('inventario', 'index')->name('inventario');
    Route::post('/inventario/store', 'store')->name('inventario.store');
    Route::post('/inventario/update/{id}', 'update')->name('inventario.update');
    Route::delete('/inventario/delete/{id}', 'delete')->name('inventario.delete');
});
Route::controller(DetalleVentaController::class)->group(function () {
    Route::get('detalleventa', 'index')->name('detalleventa');
    Route::post('/detalleventa/store', 'store')->name('detalleventa.store');
    Route::post('/detalleventa/update/{id}', 'update')->name('detalleventa.update');
    Route::delete('/detalleventa/delete/{id}', 'delete')->name('detalleventa.delete');
});
