<?php

namespace App\Http\Controllers;

use App\actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actor = Actor::all();

        return view('Pelicula/Actor/index',compact('actor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pelicula/Actor/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $actor = new Actor($request->All());
        $actor->save();

        return redirect()->route('Actor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor = Actor::findOrFail($id);

        return view('Pelicula/Actor/edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actor = Actor::findOrFail($id);

        $actor->Imagen = $request->input('imagen');
        $actor->Nombre = $request->input('nombre');
        $actor->Nacionalidad = $request->input('nacionalidad');
        $actor->Edad = $request->input('edad');

        $actor->update();
        return redirect()->route('Actor.index');
    }

}
