<?php

namespace App\Http\Controllers;

use App\administrador;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrador = DB::table('administrador')
            ->select('CI','Nombre','Apellido','Direccion','Telefono','Email')
            ->where('Estado','=',1)->get();
        return view('Administrador/index',compact('administrador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contra = $request->input('CI');

        $user = new User();
        $user->name = $request->input('Nombre');
        $user->email = $request->input('Email');
        $user->password = bcrypt($contra);
        $user->idCliente = $request->input('CI');
        $user->rol = 'Admin';
        $user->save();


        $administrador = new Administrador($request->all());
        $administrador->Estado = 1;

        $administrador->save();

        return redirect()->route('Administrador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $administrador = Administrador::findOrFail($id);

        return view('Administrador/edit', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $administrador = Administrador::findOrFail($id);

        $administrador->Nombre = $request->input('nombre');
        $administrador->Apellido = $request->input('apellido');
        $administrador->Direccion = $request->input('direccion');
        $administrador->Telefono = $request->input('telefono');

        $administrador->update();

        return redirect()->route('Administrador.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $administrador = Administrador::findOrFail($id);

        $administrador->Estado = 0;

        $administrador->update();

        return redirect()->route('Administrador.index');
    }
}
