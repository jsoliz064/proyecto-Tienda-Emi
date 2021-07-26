<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\NotaCompraController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\CompatibilidadController;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',UserController::class);

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('clientes',ClienteController::class);

Route::resource('proveedores',ProveedorController::class);


Route::resource('personales',PersonalController::class);

Route::resource('productos',ProductoController::class);

Route::resource('categorias',CategoriaController::class);

Route::resource('bitacora',BitacoraController::class);

Route::resource('notaCompras',NotaCompraController::class);

Route::resource('marcas',MarcaController::class);

Route::resource('notaVentas',NotaVentaController::class);

Route::resource('detalleVentas',DetalleVentaController::class);

//Route::resource('marcas',MarcaController::class); poner solo si esta hecho

Route::resource('autos',AutoController::class);

Route::resource('detalleCompras',detalleCompraController::class);

Route::resource('facturas',FacturaController::class);

Route::resource('compatibilidades',CompatibilidadController::class);