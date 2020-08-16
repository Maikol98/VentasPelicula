<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function ReporteIngreso()
    {
        $datos=DB::table('ingreso')->join('detalleingreso','detalleingreso.Id_Ingreso','=','ingreso.Id')
        ->join('pelicula','pelicula.Id','=','detalleingreso.Id_Ingreso')
        ->join('administrador','administrador.CI','=','ingreso.Id_Administrador')
        ->select('administrador.Nombre as Admin','PrecioTotal','Fecha','pelicula.Nombre','Cantidad')
        ->get();
        $pdf=PDF::loadView('pdf.reporteIngreso',compact('datos'));
        return $pdf->stream('Reporte.pdf');
    }

    public function ReportePedido()
    {
        $datos=DB::table('pedido')->join('detallepedido','detallepedido.Id_Pedido','=','Pedido.Id')
        ->join('cliente','cliente.CI','=','pedido.Ci_Cliente')
        ->select('pedido.Id','cliente.Nombre as cliente','PrecioTotal','FechaPedido','Direccion','pedido.Estado','Cantidad')
        ->get();
        $pdf=PDF::loadView('pdf.reportePedido',compact('datos'));
        return $pdf->stream('Reporte.pdf');
    }

}
