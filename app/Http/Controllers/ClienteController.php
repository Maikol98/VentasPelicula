<?php

namespace App\Http\Controllers;

use App\cliente;
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


        return redirect()->route('Cliente.index');
    }



    public function show(cliente $cliente)
    {
        return view('Cliente/show',compact('cliente'));
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



        return redirect()->route('Cliente.index');
    }



    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->Estado = 0;
        $cliente->update();

        return redirect()->route('Cliente.index');
    }
}
