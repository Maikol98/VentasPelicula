<?php

namespace App\Http\Controllers;

use App\detallepedido;
use App\pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallepedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id_Pedido )
    {
        // NUEVA LISTA DE LOS PRODUCTOS
        $todos = DB::table('detallepedido')
        ->select('Id_Pelicula')
        ->where('Id_Pedido','=',$id_Pedido)->pluck('Id_Pelicula');


        $peliculas = DB::table('pelicula')
            ->whereNotIn('Id',$todos)->get();
            
        return view('Pedido/DetallePedido/Listado', compact('peliculas','id_Pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$Id_Pelicula,$Id_Pedido)
    {
        $pelicula = pelicula::findOrFail($Id_Pelicula);

        $detallepedido = new detallepedido();
        $detallepedido->Id_Pedido = $Id_Pedido;
        $detallepedido->Id_Pelicula = $Id_Pelicula;
        $detallepedido->Cantidad = $request->input('Cantidad');
        $detallepedido->Subtotal = ($detallepedido->Cantidad) * ($pelicula->Precio);
        $detallepedido->save();

        //Actualizamos Precio pedido
        $detalle=DB::table('detallepedido')->select(DB::raw('SUM(Subtotal) as PrecioTot'))
        ->where('Id_Pedido','=',$Id_Pedido)->first();

        DB::table('pedido')->where('Id','=',$Id_Pedido)
        ->update(['PrecioTotal' => $detalle->PrecioTot]);

        //Actualizamos Stock
        $stock = DB::table('pelicula')->select('Stock')
            ->where('Id','=',$Id_Pelicula)->pluck('Stock');

        $Cantidad = $stock[0];

        $Cantidad = $Cantidad - $detallepedido->Cantidad;
        DB::table('pelicula')->where('Id','=',$Id_Pelicula)
        ->update(['Stock' => $Cantidad]);

        return redirect()->route('Detallepedido.index',$Id_Pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function show(detallepedido $detallepedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function edit(detallepedido $detallepedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detallepedido $detallepedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detallepedido  $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function destroy( $Id_Pelicula,$Id_Pedido)
    {
        $detallepedido = DB::table('detallepedido')
            ->select('Cantidad')
            ->where('Id_Pedido','=',$Id_Pedido)
            ->where('Id_Pelicula','=',$Id_Pelicula)->first();

        DB::table('detallepedido')->where('Id_Pedido','=',$Id_Pedido)
        ->where('Id_Pelicula','=',$Id_Pelicula)->delete();

         //ACTUALIZAMOS DATOS DEL PEDIDO
        $pedido = DB::table('detallepedido')->select(DB::raw('SUM(Subtotal) as PrecioTot'))
        ->where('Id_Pedido','=',$Id_Pedido)->first();

        if (is_null($pedido->PrecioTot)) {
            DB::table('pedido')->where('Id','=',$Id_Pedido)
            ->update(['PrecioTotal'=>0]);
        }else {
            DB::table('pedido')->where('Id','=',$Id_Pedido)
            ->update(['PrecioTotal'=>$pedido->PrecioTot]);
        }

        //Actualizamos Stock
        $stock = DB::table('pelicula')->select('Stock')
            ->where('Id','=',$Id_Pelicula)->pluck('Stock');

        $Cantidad = $stock[0];

        $Cantidad = $Cantidad + $detallepedido->Cantidad;
        DB::table('pelicula')->where('Id','=',$Id_Pelicula)
        ->update(['Stock' => $Cantidad]);

        return redirect()->route('Pedido.show',$Id_Pedido);
    }
}
