<?php

namespace App\Http\Controllers;

use App\cliente;
use App\Bitacora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{


    public function index()
    {
        $cliente = DB::table('cliente')
            ->select('CI','Nombre','Apellido','Direccion','Telefono','FechaNacimiento','Email')
            ->where('Estado','=',1)->get();
        return view('Cliente/index',compact('cliente'));
    }



    public function create()
    {
        return view('Cliente/create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'CI' => 'required',
            'Nombre' => 'required|min:4',
            'Apellido' => 'required',
            'Telefono' => 'required|numeric',
            'FechaNacimiento' => 'required',
            'Email' => 'required'
        ]);
        $contra = $request->input('CI');

        $user = new User();
        $user->name = $request->input('Nombre');
        $user->email = $request->input('Email');
        $user->password = bcrypt($contra);
        $user->idCliente = $request->input('CI');
        $user->rol = 'Cliente';
        $user->save();

        $cliente = new Cliente( $request->all());
        $cliente->FechaNacimiento = date('Y-m-d', strtotime($request->input('FechaNacimiento')));
        $cliente->Estado = 1;
        $cliente->save();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = $request->input('Nombre');
        $bitacora->accion = 'Nuevo Cliente';
        $bitacora->tipo= 'Cliente';
        $bitacora->Categoria = 'Cliente';
        $bitacora->save();

        return redirect()->route('Cliente.index');
    }




    public function edit( $id )
    {
        $cliente = Cliente::findOrFail($id);
        return view('Cliente/edit', compact('cliente'));
    }



    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->Nombre = $request->input('Nombre');
        $cliente->Apellido = $request->input('Apellido');
        $cliente->Telefono = $request->input('Telefono');
        $cliente->Direccion = $request->input('Direccion');
        $cliente->Email = $request->input('Email');

        $cliente->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Actualizar Cliente';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Cliente';
        $bitacora->save();

        return redirect()->route('Cliente.index');
    }



    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->Estado = 0;
        $cliente->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Eliminar Cliente';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Cliente';
        $bitacora->save();

        return redirect()->route('Cliente.index');
    }
}
