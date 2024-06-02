<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Cupon;
use App\Models\Plato;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    //

    public function addPedido(Request $request){

        $idMesa = $request->input('idMesa');
        $platos = $request->input('platos');
        $cupones = $request->input('cupones');

        return Pedido::addPedido($idMesa, $platos, $cupones);

    }

    public function confirmarPago(Request $request){

        $idMesa = $request->input('idMesa');
        $platos = $request->input('platos');
        $cupones = $request->input('cupones');
        $newPlatos = [];
        $precioTotal = 0;
        $sumaPrecios = 0;
        $nombresCupones = [];
        $idCupones = [];

        if($cupones != null){

            foreach ($cupones as $cupon){

                $cupon = DB::select("SELECT * FROM platos INNER JOIN cupon_platos ON platos.id = cupon_platos.platoId WHERE cupon_platos.cuponId = " . $cupon);
                $idCupon = $cupon[0]->cuponId;
                $nombreCupon = DB::select("SELECT name FROM cupones WHERE id = " . $idCupon)[0]->name;
                $nombresCupones[] = $nombreCupon;
                $porcentaje = DB::select("SELECT porcentaje FROM cupones WHERE id = " . $idCupon)[0]->porcentaje;

                foreach ($cupon as $plato){

                    $idCupones[] = $plato->platoId;

                    $sumaPrecios += $plato->precio;

                }

                $precioTotal += ($porcentaje / 100) * $sumaPrecios;

            }

        }

        if($platos != null){

            foreach ($platos as $plato){

                $plato = Plato::find($plato);

                $newPlatos[] = $plato;

                $precioTotal += $plato->precio;

            }

        }

        return view('templates/confirmar_pago', ['idMesa' => $idMesa, 'platos' => $newPlatos, 'precioTotal' => $precioTotal, 'nombresCupones' => $nombresCupones, 'idCupones' => $idCupones]);

    }

    public function newPedido($idMesa){

        $allPlatos = Plato::all();
        $favoritos = [];
        $allCupones = [];

        if(Auth::user() && Auth::user()->currentTeam->name = 'Admin'){

            $allCupones = Cupon::where('activo', '=', true)->get();
            $favoritos = DB::select("SELECT * FROM favoritos INNER JOIN platos ON favoritos.platoId = platos.id WHERE userId = " . auth()->user()->id);

            foreach($favoritos as $plato){

                $plato->ingredientes = Plato::with('ingredientes')->find($plato->id)->ingredientes;

            }
        }

        return view('templates/platos_carta', ['idMesa' => $idMesa, 'allPlatos' => $allPlatos, 'allCupones' => $allCupones, 'favoritos' => $favoritos]);

    }

    public function index($paginaPedido){

        if(Auth::user() && Auth::user()->currentTeam->name != 'Admin'){

            $user = Auth::user();
            $pedidosUser = [];

            $min = $paginaPedido * 10 - 10;
            $max = $paginaPedido * 10;
            $i = 0;

            $pedidos = DB::table('pedidos')->join('plato_pedidos', 'pedidos.id', '=', 'plato_pedidos.pedidoId')->join('platos', 'plato_pedidos.platoId', '=', 'platos.id')->where('userId', '=', $user->id)->orderBy('pedidoId', 'desc')->skip($min)->take($max)->get();



            foreach($pedidos as $pedido){

                $pedidosUser[$pedido->pedidoId][$i]['pedidoId'] = $pedido->pedidoId;
                $pedidosUser[$pedido->pedidoId][$i]['nombre'] = $pedido->nombre;
                $pedidosUser[$pedido->pedidoId][$i]['rutaImagen'] = $pedido->rutaImagen;
                $pedidosUser[$pedido->pedidoId][$i]['precio'] = $pedido->precio;

                $i++;
            }

            return view('templates/pedidos_lista', ['pagina' => $paginaPedido, 'pedidos' => $pedidosUser]);

        }

        if(Auth::user() && Auth::user()->currentTeam->name == 'Admin'){

            $user = Auth::user();
            $pedidosUser = [];

            $i = 0;

            $pedidos = DB::table('pedidos')->selectRaw(" *, plato_pedidos.id as platoPedidoId")->join('plato_pedidos', 'pedidos.id', '=', 'plato_pedidos.pedidoId')->join('platos', 'plato_pedidos.platoId', '=', 'platos.id')->where('fecha', '=', date('Y-m-d'))->where('estado', '=', 0)->orderBy('pedidoId', 'asc')->get();

            foreach($pedidos as $pedido){

                $pedidosUser[$pedido->pedidoId][$i]['platoPedidoId'] = $pedido->platoPedidoId;
                $pedidosUser[$pedido->pedidoId][$i]['pedidoId'] = $pedido->pedidoId;
                $pedidosUser[$pedido->pedidoId][$i]['platoId'] = $pedido->platoId;
                $pedidosUser[$pedido->pedidoId][$i]['nombre'] = $pedido->nombre;
                $pedidosUser[$pedido->pedidoId][$i]['rutaImagen'] = $pedido->rutaImagen;
                $pedidosUser[$pedido->pedidoId][$i]['precio'] = $pedido->precio;

                $i++;
            }

            return view('templates/pedidos_lista', ['pagina' => $paginaPedido, 'pedidos' => $pedidosUser]);

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión para ver tus pedidos']);

    }

    public function finalizarPedido($pedidoId){

        if(Auth::user() && Auth::user()->currentTeam->name == 'Admin'){

            $platoPedido = DB::table('plato_pedidos')->where('id', '=', $pedidoId)->update(['estado' => 1]);

            return redirect('/pedidos/1');

        }

        return view('templates/index', ['error' => 'Debes iniciar sesión como administrador para finalizar los pedidos']);

    }
}
