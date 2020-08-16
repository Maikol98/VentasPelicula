<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function index($catego){
        $bitacora = DB::table('bitacora')->where('Categoria','=',$catego)->get();
        return view('Bitacora',compact('bitacora'));
    }
}
