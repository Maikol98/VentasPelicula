<?php

namespace App\Http\Controllers;

use App\detalleingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleingresoController extends Controller
{


    public function index(){
        $detalleingreso = Detalleingreso::all();
        return view('Pelicula/Ingreso/Indexdetalle', compact('detalleingreso'));
    }




    public function create($Id){
        return view('Pelicula/Ingreso/Detallecreate', compact('Id'));
    }


    public function store(Request $request, $Id){

        $detalleingreso = new detalleingreso($request->all());
        $detalleingreso->Id_Ingreso = $Id;
        $detalleingreso->Sutotal = ($detalleingreso->Precio) * ($detalleingreso->Cantidad);
        $detalleingreso->save();

        //Actualizamos Precio Ingreso
        $detalleingreso=DB::table('detalleingreso')->select(DB::raw('SUM(Sutotal) as PrecioTot'))
        ->where('detalleingreso.Id_Ingreso','=',$Id)->first();

        DB::table('Ingreso')->where('Id','=',$Id)
        ->update(['PrecioTotal' => $detalleingreso->PrecioTot]);

        //Actualizamos Stock
        $stock = DB::table('pelicula')->select('Stock')
            ->where('Id','=',$request->input('Id_Pelicula'))->pluck('Stock');

        $Cantidad = $request->input('Cantidad');

        $Cantidad = $Cantidad + $stock[0];
        DB::table('pelicula')->where('Id','=',$request->input('Id_Pelicula'))
        ->update(['Stock' => $Cantidad]);

        return redirect()->route('Detalleingreso.create',$Id);

    }




    public function edit($idIngreso, $idPelicula){

        $detalleingreso = DB::table('detalleingreso')
        ->select('Id_Ingreso','Id_Pelicula','Cantidad','Precio')
        ->where('Id_Ingreso','=',$idIngreso)
        ->where('Id_Pelicula','=',$idPelicula)->first();
        return view('Pelicula/Ingreso/editdetalle',compact('detalleingreso'));
    }




    public function update(Request $request, $idIngreso, $idPelicula){

        $Cantidad = $request->input('Cantidad');
        $Precio = $request->input('Precio');
        $subtotal = $Cantidad * $Precio;

        DB::table('detalleingreso')
        ->where('Id_Ingreso','=',$idIngreso)
        ->where('Id_Pelicula','=',$idPelicula)
        ->update([
            'Cantidad' => $Cantidad,
            'Precio' => $Precio,
            'Sutotal' => $subtotal
        ]);

        //Actualizamos Precio Ingreso
        $detalleingreso=DB::table('detalleingreso')->select(DB::raw('SUM(Sutotal) as PrecioTot'))
        ->where('detalleingreso.Id_Ingreso','=',$idIngreso)->first();

        DB::table('Ingreso')->where('Id','=',$idIngreso)
        ->update(['PrecioTotal' => $detalleingreso->PrecioTot]);

        //Actualizamos Stock
        $stock = DB::table('pelicula')->select('Stock')
            ->where('Id','=',$idPelicula)->pluck('Stock');

        $Cantidad = $stock[0] + $Cantidad;

        DB::table('pelicula')->where('Id','=',$request->input('Id_Pelicula'))
        ->update(['Stock' => $Cantidad]);

        return redirect()->route('Ingreso.show',$idIngreso);

    }




    public function destroy($idIngreso, $idPelicula){

        $Cant = DB::table('detalleingreso')->select('Cantidad')
        ->where('Id_Ingreso','=',$idIngreso)
        ->where('Id_Pelicula','=',$idPelicula)->pluck('Cantidad');

        DB::table('detalleingreso')->where('Id_Ingreso','=',$idIngreso)
        ->where('Id_Pelicula','=',$idPelicula)->delete();

        //Actualizamos Precio Ingreso
        $detalleingreso=DB::table('detalleingreso')->select(DB::raw('SUM(Sutotal) as PrecioTot'))
        ->where('detalleingreso.Id_Ingreso','=',$idIngreso)->first();

        if ($detalleingreso->PrecioTot === null) {
            $detalleingreso->PrecioTot = 0;
        }

        DB::table('Ingreso')->where('Id','=',$idIngreso)
        ->update(['PrecioTotal' => $detalleingreso->PrecioTot]);

        //Actualizamos Stock
        $stock = DB::table('pelicula')->select('Stock')
            ->where('Id','=',$idPelicula)->pluck('Stock');

        $Cantidad = $Cant[0];
        $Cantidad = $stock[0] - $Cantidad;

        DB::table('pelicula')->where('Id','=',$idPelicula)
        ->update(['Stock' => $Cantidad]);

        return redirect()->route('Ingreso.show',$idIngreso);
    }
}
