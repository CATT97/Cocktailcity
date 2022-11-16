<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CompraUsuarioController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use App\Models\Precio;
use App\Models\Productos;
use App\Models\User;
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
    $productos = Productos::all();
    $precios = Precio::all()->sortBy('Size');
    return view('welcome',compact('productos','precios'));
});

Route::get('/401', function () {
    return view('errors.401');
});

Auth::routes();

Route::get('layouts/app', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/usuarios',UsuarioController::class);
Route::resource('/productos',ProductosController::class);
Route::put('/agregar-inventario/{producto}', [App\Http\Controllers\ProductosController::class, 'agregarInventario'])->name('productos.agregarInventario');
Route::resource('/precios',PrecioController::class);
Route::resource('/cart', CartController::class);
Route::resource('/compras', CompraController::class);
Route::resource('/comprasusuario', CompraUsuarioController::class);
Route::get('/ventas', [App\Http\Controllers\ProductosController::class, 'ventas'])->name('compras.ventas');
Route::put('/ventas/{item}', [App\Http\Controllers\ProductosController::class, 'cambiarestado'])->name('compras.cambiarestado');

Route::get('/perfil/{usuario}', function (User $usuario) {
    return view('usuarios.perfil', compact('usuario'));
})->name('perfil');
Route::get('/perfil/editar/{usuario}', function (User $usuario) {
    return view('usuarios.editarperfil', compact('usuario'));
});
Route::put('/perfil/actualizar/{usuario}', [App\Http\Controllers\PerfilControler::class, 'update'])->name('perfil.update');

Route::resource('/direcciones', DireccionController::class);