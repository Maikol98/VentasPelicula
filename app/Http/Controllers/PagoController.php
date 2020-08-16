<?php

namespace App\Http\Controllers;

use App\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pago::all();
        return view();
    }



    public function create($idPedido)
    {
        $pedido = DB::table('pedido')
            ->where('Id','=',$idPedido)->first();
        $pago = DB::table('pago')->where('Id_Pedido')->first();

        if ($pago == null) {
            return view('Pedido/Pago/Tarjeta',compact('pedido'));
        }
        
        return view('Pedido/Pago/Pago');

    }



    public function store(Request $request,$idPedido)
    {
        $pedido = new pedido($request->all());
        $pedido->TipoPago = 'Tarjeta';
        $pedido->Fecha = date('Y-m-d');
        $pedido->Id_Pedido = $idPedido;

        $pedido->save();
        DB::table('pedido')->where('Id','=',$idPedido)->update(['Estado' => 'En Proceso']);

        return redirect()->route('Pedido.index');
    }

    public function efectivo($idPedido){
        $dato = DB::table('pedido')
            ->where('Id','=',$idPedido)->first();

        $pedido = new pedido();
        $pedido->TipoPago = 'Efectivo';
        $pedido->Fecha = date('Y-m-d');
        $pedido->Monto = $dato->Monto;
        $pedido->Id_Pedido = $idPedido;

        $pedido->save();
        DB::table('pedido')->where('Id','=',$idPedido)->update(['Estado' => 'En Proceso']);

        return redirect()->route('Pedido.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        //
    }
}
