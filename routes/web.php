<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contacto', [IndexController::class, 'contacto'])->name('contacto');
Route::get('/sobre', [IndexController::class, 'sobre'])->name('sobre');


Route::get('/pedidos/{paginaPedido}', [PedidoController::class, 'index'])->name('pedidos_lista');
Route::get('/new_pedido/{idMesa}', [PedidoController::class, 'newPedido'])->name('pedido_new');
Route::get('/confirmar_pago', [PedidoController::class, 'confirmarPago'])->name('confirmar_pago');
Route::post('/add_pedido', [PedidoController::class, 'addPedido'])->name('pedido_add');
Route::post('/finalizar_plato/{idPlatoPedido}', [PedidoController::class, 'finalizarPedido'])->name('pedido_finalizar');


Route::get('/carta', [PlatoController::class, 'index'])->name('platos_carta');
Route::get('/plato_detalle/{idPlato}', [PlatoController::class, 'detalles'])->name('platos_detalle');
Route::get('/plato_edit/{idPlato}', [PlatoController::class, 'editPlato'])->name('platos_edit');
Route::post('/add_plato', [PlatoController::class, 'addPlato'])->name('plato_add');
Route::post('/plato_edit_post/{idPlato}', [PlatoController::class, 'updatePlato'])->name('plato_edit_post');
/*Remove*/ Route::post('/remove_plato/{idPlato}', [PlatoController::class, 'removePlato'])->name('plato_remove');


Route::get('/cupones', [CuponController::class, 'index'])->name('cupones_lista');
Route::get('/cupon_detalle/{idCupon}', [CuponController::class, 'detalles'])->name('cupon_detalle');
Route::post('/add_cupon', [CuponController::class, 'addCupon'])->name('cupon_add');
Route::get('/edit_cupon/{idCupon}', [CuponController::class, 'editCupon'])->name('cupon_edit');
Route::post('/edit_cupon_post/{idCupon}', [CuponController::class, 'editCuponPost'])->name('cupon_edit_post');
/*Remove*/ Route::post('/remove_cupon/{idCupon}', [CuponController::class, 'removeCupon'])->name('cupon_remove');

Route::get('/user/favoritos', [UserController::class, 'favoritos'])->name('user_favoritos');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/reservas', [UserController::class, 'pageReservasUser'])->name('user_reservas');
Route::get('/pedidos/1', [UserController::class, 'pedidos'])->name('user_pedidos');
Route::get('/getReservas/user', [UserController::class, 'reservasUser'])->name('user_reservas');
Route::post('/add_favorito/{platoId}', [UserController::class, 'addFavorito'])->name('favorito_add');
/*Remove*/ Route::post('/remove_favorito/{idFavorito}', [UserController::class, 'removeFavorito'])->name('favorito_remove');
/*Remove*/ Route::post('/remove_favorito_user/{idPlato}', [UserController::class, 'removeFavoritoUser'])->name('favorito_remove_user');

Route::post('/user', [UserController::class, 'index'])->name('user_update');


Route::post('/add_reserva', [ReservasController::class, 'addReserva'])->name('reserva_add');
/*Remove*/ Route::post('/remove_reserva/{idReserva}', [ReservasController::class, 'removeReserva'])->name('reserva_remove');


Route::get('/admin_gestion_platos', [PlatoController::class, 'gestion'])->name('platos_gestion');
Route::get('/admin_reservas', [ReservasController::class, 'reservas'])->name('admin_reservas');


Route::get('/test', [IndexController::class, 'test'])->name('test');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('templates/index');
    })->name('dashboard');
});
