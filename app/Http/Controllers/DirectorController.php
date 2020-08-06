<?php

namespace App\Http\Controllers;

use App\director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $director = Director::all();

        return view('Pelicula/Director/index',compact('director'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pelicula/Director/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $director = new Director();
        $director->Imagen = $request->input('imagen');
        $director->Nombre = $request->input('nombre');
        $director->Nacionalidad = $request->input('nacionalidad');
        $director->Edad = $request->input('edad');
        $director->save();

        return redirect()->route('Director.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $director = Director::findOrFail($id);

        return view('Pelicula/Director/edit',compact('director'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $director = Director::findOrFail($id);

        $director->Imagen = $request->input('imagen');
        $director->Nombre = $request->input('nombre');
        $director->Nacionalidad = $request->input('nacionalidad');
        $director->Edad = $request->input('edad');
        $director->update();

        return redirect()->route('Director.index');
    }


}
