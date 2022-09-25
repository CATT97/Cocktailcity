<?php

use App\Http\Controllers\PrecioSizeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/401', function () {
    return view('401');
});

Auth::routes();

Route::get('layouts/app', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/usuarios',UsuarioController::class);
Route::resource('/productos',ProductosController::class);
Route::put('/productos/{producto}', [App\Http\Controllers\ProductosController::class, 'agregarInventario'])->name('productos.agregarInventario');
Route::resource('/productos/precios-y-tamanos',PrecioSizeController::class);