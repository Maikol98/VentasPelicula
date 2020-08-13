<?php

namespace App\Http\Controllers;

use App\detallecarrito;
use App\pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallecarritoController extends Controller
{

    

    public function store(Request $request,$id_carrito, $id_pelicula)
    {
        $precioPelicula = DB::table('pelicula')
        ->select('Precio')
        ->where('Id','=',$id_pelicula)->first();

        $detalle = new Detallecarrito();

        $cantidadPelicula = $request->input('cantidad');
        $detalle->Id_Carrito = $id_carrito;
        $detalle->Id_Pelicula = $id_pelicula;
        $detalle->Cantidad = $cantidadPelicula;
        $detalle->Subtotal = $cantidadPelicula * $precioPelicula->Precio;

        $detalle->save();
        $IdCarrito = $id_carrito;

        //ACTUALIZAMOS DATOS DEL CARRITO
        $carrito=DB::table('detallecarrito')->select(DB::raw('SUM(Subtotal) as PrecioTot'))
        ->where('detallecarrito.Id_Carrito','=',$id_carrito)->first();

        DB::table('carrito')->where('Id','=',$id_carrito)
        ->update(['PrecioTotal'=>$carrito->PrecioTot]);


        // NUEVA LISTA DE LOS PRODUCTOS
        $todos = DB::table('detallecarrito')
        ->select('Id_Pelicula')
        ->where('Id_Carrito','=',$id_carrito)->pluck('Id_Pelicula');


        $peliculas = DB::table('pelicula')
            ->whereNotIn('Id',$todos)->get();



        return view('Carrito/Carrito/listaProducto',compact('peliculas','IdCarrito'));
    }





    public function edit($id_carrito,$id_pelicula)
    {
        $detalle = DB::table('detallecarrito')
        ->select('Id_Carrito','Id_Pelicula','Cantidad','Subtotal')
        ->where('Id_Carrito','=',$id_carrito)
        ->where('Id_Pelicula','=',$id_pelicula)->first();

        return view('Carrito/DetalleCarrito/edit',compact('detalle'));
    }




    public function update(Request $request, $id_carrito,$id_pelicula)
    {
        $detalle = DB::table('detallecarrito')
        ->join('pelicula','pelicula.Id','=','detallecarrito.Id_Pelicula')
        ->select('Id_Carrito','Id_Pelicula','Cantidad','Subtotal','Precio')
        ->where('Id_Carrito','=',$id_carrito)
        ->where('Id_Pelicula','=',$id_pelicula)->first();


        $cantidadPelicula = $request->input('cantidad');
        $detalle->Cantidad = $cantidadPelicula;
        $detalle->Subtotal = $cantidadPelicula * ($detalle->Precio);

        // ACTUALIZAMOS LOS DATOS DEL DETALLE
        DB::table('detallecarrito')->where('Id_Carrito','=',$id_carrito)
        ->where('Id_Pelicula','=',$id_pelicula)
        ->update(['Cantidad'=>$detalle->Cantidad,'Subtotal'=>$detalle->Subtotal]);

        //ACTUALIZAMOS DATOS DEL CARRITO
        $carrito=DB::table('detallecarrito')->select(DB::raw('SUM(Subtotal) as PrecioTot'))
        ->where('detallecarrito.Id_Carrito','=',$id_carrito)->first();

        DB::table('carrito')->where('Id','=',$id_carrito)
        ->update(['PrecioTotal'=>$carrito->PrecioTot]);

        // ACTUALIZAMOS DATOS DEL STOCK
        // $pelicula = Pelicula::findOrFail($id_pelicula);
        // $pelicula->Stock = $pelicula->Stock - $detalle->Cantidad;
        // $pelicula->update();


        return redirect()->route('Carrito.show',$id_carrito);

    }




    public function destroy($id_carrito,$id_pelicula)
    {

        DB::table('detallecarrito')->where('Id_Carrito','=',$id_carrito)
        ->where('Id_Pelicula','=',$id_pelicula)->delete();

         //ACTUALIZAMOS DATOS DEL CARRITO
        $carrito=DB::table('detallecarrito')->select(DB::raw('SUM(Subtotal) as PrecioTot'))
        ->where('detallecarrito.Id_Carrito','=',$id_carrito)->first();
        if (is_null($carrito->PrecioTot)) {
            $cero = 0;
            DB::table('carrito')->where('Id','=',$id_carrito)
            ->update(['PrecioTotal'=>$cero]);
        }else {
            DB::table('carrito')->where('Id','=',$id_carrito)
            ->update(['PrecioTotal'=>$carrito->PrecioTot]);
        }

        //ACTUALIZAMOS DATOS DEL STOCK
        // $pelicula = Pelicula::findOrFail($id_pelicula);
        // $pelicula->Stock = $pelicula->Stock + $detalle->Cantidad;
        // $pelicula->update();

        return redirect()->route('Carrito.show',$id_carrito);
    }
}
