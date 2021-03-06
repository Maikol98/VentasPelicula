<?php

namespace App\Http\Controllers;

use App\peliculaactor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pelicula/Actor/Pelicula');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acto = new peliculaactor($request->all());
        $acto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\peliculaactor  $peliculaactor
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\peliculaactor  $peliculaactor
     * @return \Illuminate\Http\Response
     */
    public function edit(peliculaactor $peliculaactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\peliculaactor  $peliculaactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peliculaactor $peliculaactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peliculaactor  $peliculaactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(peliculaactor $peliculaactor)
    {
        //
    }
}
