<?php

namespace App\Http\Controllers;

use App\carrito;
use App\pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{

    public function index()
    {
        if (auth()->user()->rol == 'Cliente') {
            $carrito = DB::table('carrito')
                ->join('cliente', 'cliente.CI','=','carrito.CI_Cliente')
                ->select('Id','PrecioTotal','Descripcion','Nombre')
                ->where('cliente.CI','=',auth()->user()->idCliente)->get();
        } else {
            $carrito = DB::table('carrito')
                ->join('cliente', 'cliente.CI','=','carrito.CI_Cliente')
                ->select('Id','PrecioTotal','Descripcion','Nombre')->get();
        }
        return view('Carrito/Carrito/index', compact('carrito'));
    }



    public function create()
    {
        return view('Carrito/Carrito/create');
    }



    public function store(Request $request)
    {
        $carrito = new Carrito();
        $carrito->CI_Cliente = auth()->user()->idCliente;
        $carrito->PrecioTotal = 0;
        $carrito->Descripcion = $request->input('descripcion');
        $carrito->save();

        $id_carrito = $carrito->Id;

        return redirect()->route('Detallecarrito.index',$id_carrito);
    }




    public function show( $id)
    {
        $carrito = DB::table('detallecarrito')
        ->join('pelicula','pelicula.Id','=','detallecarrito.Id_Pelicula')
        ->select('Id_Carrito','Id_Pelicula','Cantidad','Subtotal','Nombre','Precio')
        ->where('Id_Carrito','=',$id)->get();

        return view('Carrito/Carrito/show',compact('carrito'));

    }



    public function destroy( $id)
    {
        Carrito::destroy($id);
        return redirect()->route('Carrito.index');
    }
}
