<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = DB::table('cliente')
            ->select('CI','Nombre','Apellido','Direccion','Telefono','FechaNacimiento','Email')
            ->where('Estado','=',1)->get();
        return view('Cliente/index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->CI = $request->input('CI');
        $cliente->Nombre = $request->input('nombre');
        $cliente->Apellido = $request->input('apellido');
        $cliente->Telefono = $request->input('telefono');
        $cliente->FechaNacimiento = $request->input('fecha');
        $cliente->Direccion = $request->input('direccion');
        $cliente->Email = $request->input('email');
        $cliente->Estado = 1;

        $cliente->save();

        // $usuario = new Usuario();
        // $usuario->Nombre = $request->input('nombre');
        // $usuario->Correo = $request->input('email');
        // $usuario->Password = $request->input('password');
        // $usuario->Categoria = "Cliente";
        // $usuario->save();

        return redirect()->route('Cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('Cliente/edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->Nombre = $request->input('nombre');
        $cliente->Apellido = $request->input('apellido');
        $cliente->Telefono = $request->input('telefono');
        $cliente->Direccion = $request->input('direccion');
        $cliente->Email = $request->input('email');

        $cliente->update();

        return redirect()->route('Cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->Estado = 0;
        $cliente->update();

        return redirect()->route('Cliente.index');
    }
}
