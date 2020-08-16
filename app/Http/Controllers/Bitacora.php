<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Bitacora extends Controller
{
    public function index($catego){
        $bitacora = DB::table('bitacora')->where('Categoria','=',$catego)->get();
        return view('Bitacora',compact('bitacora'));
    }
}
