<?php

namespace App\Http\Controllers;

use App\pedido;
use App\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = auth()->user()->rol;
        if( $rol == "Cliente"){
            $pedido = DB::table('pedido')
                ->join('cliente','cliente.CI','=','pedido.Ci_Cliente')
                ->select('Id','FechaPedido','PrecioTotal','pedido.Estado','Nombre')
                ->where('cliente.CI','=',auth()->user()->idCliente)
                ->get();
        }else{
            $pedido = DB::table('pedido')
                ->join('cliente','cliente.CI','=','pedido.Ci_Cliente')
                ->select('Id','FechaPedido','PrecioTotal','pedido.Estado','Nombre')
                ->get();
        }

        return view('Pedido/Pedido/index',compact('pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->rol == 'Admin') {
        return view('Pedido/Pedido/Admin');
        }
        return view('Pedido/Pedido/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido($request->all());
        $pedido->FechaPedido = date('Y-m-d');
        $pedido->PrecioTotal = 0;
        $pedido->Estado = 'En Proceso';

        if (auth()->user()->rol === 'Admin') {
            $pedido->Ci_Cliente = $request->input('cliente');
        }else{
            $pedido->Ci_Cliente = auth()->user()->idCliente;
        }

        $pedido->save();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Nuevo Pedido';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Pedido';
        $bitacora->save();

        $pedidoId = $pedido->Id;
        return redirect()->route('Detallepedido.index',$pedidoId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $pedido = DB::table('detallepedido')
            ->join('pelicula','pelicula.Id','=','detallepedido.Id_Pelicula')
            ->select('Id_Pedido','Id_Pelicula','Cantidad','Subtotal','Nombre')
            ->where('Id_Pedido','=',$id)->get();

        return view('Pedido/DetallePedido/index',compact('pedido','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedido $pedido)
    {
        //
    }
}
