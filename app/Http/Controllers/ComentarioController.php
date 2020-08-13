<?php

namespace App\Http\Controllers;

use App\comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{


    public function store(Request $request, $Id_Pelicula)
    {
        $comentario = new Comentario();
        $comentario->Descripcion = $request->input('Comentario');
        $comentario->Id_Pelicula = $Id_Pelicula;
        $comentario->Id_Cliente = auth()->user()->idCliente;

        $comentario->save();

        return redirect()->route('Pelicula.show',$Id_Pelicula);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentario $comentario)
    {
        //
    }
}
