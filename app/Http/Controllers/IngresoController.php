<?php

namespace App\Http\Controllers;

use App\ingreso;
use App\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{


    public function index()
    {
        $ingreso = DB::table('ingreso')
            ->join('administrador','administrador.CI','=','ingreso.Id_Administrador')
            ->select('Id','PrecioTotal','Fecha','Nombre')
            ->where('ingreso.Estado','=',1)->get();

        return view('Pelicula/Ingreso/index',compact('ingreso'));
    }



    public function store(Request $request)
    {
        $ingreso = new Ingreso();
        $ingreso->PrecioTotal = 0;
        $ingreso->fecha = date('y-m-d');
        $ingreso->Id_Administrador = auth()->user()->idCliente;
        $ingreso->Estado = 1;
        $ingreso->save();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Nuevo Ingreso';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Ingreso';
        $bitacora->save();

        $Id = $ingreso->Id;

        return redirect()->route('Detalleingreso.create',$Id);
    }



    public function show($id)
    {
        $ingreso = DB::table('detalleingreso')
            ->join('pelicula','pelicula.Id','=','detalleingreso.Id_Pelicula')
            ->select('Id_Ingreso','Id_Pelicula','Nombre','Cantidad','detalleingreso.Precio','Sutotal')
            ->where('detalleingreso.Id_Ingreso','=',$id)->get();

            return view('Pelicula/Ingreso/Indexdetalle',compact('ingreso'));
    }


    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->Estado = 0;
        $ingreso->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Elimino Ingreso';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Ingreso';
        $bitacora->save();

        return redirect()->route('Ingreso.index');
    }
}
