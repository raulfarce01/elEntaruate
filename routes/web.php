<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservasController;

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

Route::get('/', [indexController::class, 'index'])->name('index');


Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos_lista');
Route::get('/detalle_pedidos', [PedidoController::class, 'detalles'])->name('pedidos_detalle');
Route::get('/estado_pedido/{idPedido}', [PedidoController::class, 'estado'])->name('pedidos_estado');
Route::post('/add_pedido', [PedidoController::class, 'addPedido'])->name('pedido_add');


Route::get('/carta', [PlatoController::class, 'index'])->name('platos_carta');
Route::get('/plato_detalle/{idPlato}', [PlatoController::class, 'detalles'])->name('platos_detalle');
Route::post('/add_plato', [PlatoController::class, 'addPlato'])->name('plato_add');
/*Remove*/ Route::post('remove_plato/{idPlato}', [PlatoController::class, 'removePlato'])->name('plato_remove');


Route::get('/cupones', [CuponController::class, 'index'])->name('cupones_lista');
Route::get('/cupon_detalle/{idCupon}', [CuponController::class, 'detalles'])->name('cupon_detalle');
Route::post('/add_cupones', [CuponController::class, 'addCupon'])->name('cupon_add');
/*Remove*/ Route::post('/remove_cupon/{idCupon}', [CuponController::class, 'removeCupon'])->name('cupon_remove');

Route::get('/user/{idUser}/favoritos', [UserController::class, 'favoritos'])->name('user_favoritos');
Route::get('/user/{idUser}', [UserController::class, 'index'])->name('user');
Route::get('/user/{idUser}/reservas', [UserController::class, 'reservasUser'])->name('user_reservas');
Route::post('/add_favorito', [UserController::class, 'addFavorito'])->name('favorito_add');
/*Remove*/ Route::post('/remove_favorito/{idFavorito}', [UserController::class, 'removeFavorito'])->name('favorito_remove');


Route::post('/add_reserva', [ReservasController::class, 'addReserva'])->name('reserva_add');
/*Remove*/ Route::post('/remove_reserva/{idReserva}', [ReservaController::class, 'removeReserva'])->name('reserva_remove');


Route::get('/admin_gestion_platos', [PlatoController::class, 'gestion'])->name('platos_gestion');
Route::get('/admin_reservas', [ReservasController::class, 'reservas'])->name('admin_reservas');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('templates/index');
    })->name('dashboard');
});
