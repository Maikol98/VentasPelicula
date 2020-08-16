<?php

namespace App\Http\Controllers;

use App\pelicula;
use App\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{

    public function index()
    {
        $pelicula = Pelicula::all();

        return view('Pelicula/Pelicula/index',compact('pelicula'));
    }


    public function create()
    {
        return view('Pelicula/Pelicula/create');
    }




    public function store(Request $request)
    {
        $pelicula = new Pelicula($request->all());
        $pelicula->Stock = 0;
        $pelicula->save();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Nueva Pelicula';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Pelicula';
        $bitacora->save();

        return redirect()->route('Pelicula.index');
    }



    public function show( $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        //comentarios
        $comentario = DB::table('comentario')
            ->join('cliente','cliente.CI','=','comentario.Id_Cliente')
            ->select('Id','Descripcion','Nombre')
            ->where('comentario.Id_Pelicula','=',$id)
            ->get();

        return view('Pelicula/Pelicula/show', compact('pelicula','comentario'));
    }



    public function edit( $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        return view('Pelicula/Pelicula/edit', compact('pelicula'));
    }


    public function update(Request $request,  $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->Nombre = $request->input('nombre');
        $pelicula->Descripcion = $request->input('descripcion');
        $pelicula->Precio = $request->input('precio');
        $pelicula->Poster = $request->input('poster');
        $pelicula->Trailer = $request->input('trailer');
        $pelicula->Distribucion = $request->input('distribucion');
        $pelicula->Categoria = $request->input('categoria');

        $pelicula->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Actualizo Pelicula';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Pelicula';
        $bitacora->save();

        return redirect()->route('Pelicula.index');
    }

    public function lista(){
        $peliculas = Pelicula::all();

        return view('Pelicula/Home',compact('peliculas'));
    }

}
