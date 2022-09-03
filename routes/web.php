<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RealizacionController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\UserController;

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
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['usertype:1']], function () {
    Route::get('/dashboard', 'Admin\AdminController@getDashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirect', [
        HomeController::class,
        'redirect'
    ]);
});

Route::get('adminpanel', [
    HomeController::class,
    'adminpanel'
])->name('adminpanel');

Route::resource('adminpanel/categorias', CategoriaController::class);
Route::resource('adminpanel/impuestos', ImpuestoController::class);
Route::resource('adminpanel/pagos', PagoController::class);
Route::resource('adminpanel/pedidos', PedidoController::class);
Route::resource('adminpanel/productos', ProductoController::class);
Route::resource('adminpanel/proveedores', ProveedorController::class);
Route::resource('adminpanel/realizaciones', RealizacionController::class);
Route::resource('adminpanel/subcategorias', SubcategoriaController::class);
Route::resource('adminpanel/users', UserController::class);
