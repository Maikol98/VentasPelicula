<?php

namespace App\Http\Controllers;

use App\pelicula;
use Illuminate\Http\Request;

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
        $pelicula = new Pelicula();
        $pelicula->Nombre = $request->input('nombre');
        $pelicula->Descripcion = $request->input('descripcion');
        $pelicula->Precio = $request->input('precio');
        $pelicula->Stock = 0;
        $pelicula->Poster = $request->input('poster');
        $pelicula->Trailer = $request->input('trailer');
        $pelicula->Distribucion = $request->input('distribucion');
        $pelicula->Categoria = $request->input('categoria');
        $pelicula->Valoracion = 0.0;

        $pelicula->save();

        return redirect()->route('Pelicula.index');
    }



    public function show( $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        return view('Pelicula/Pelicula/show', compact('pelicula'));
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

        return redirect()->route('Pelicula.index');
    }

}
