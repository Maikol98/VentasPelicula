<?php

namespace App\Http\Controllers;

use App\administrador;
use App\Bitacora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{


    public function index()
    {
        $administrador = DB::table('administrador')
            ->select('CI','Nombre','Apellido','Direccion','Telefono','Email')
            ->where('Estado','=',1)->get();
        return view('Administrador/index',compact('administrador'));
    }



    public function create()
    {
        return view('Administrador/create');
    }



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

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Nuevo Administrador';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Administrador';
        $bitacora->save();

        return redirect()->route('Administrador.index');
    }



    public function edit( $id)
    {
        $administrador = Administrador::findOrFail($id);

        return view('Administrador/edit', compact('administrador'));
    }



    public function update(Request $request, $id)
    {
        $administrador = Administrador::findOrFail($id);

        $administrador->Nombre = $request->input('nombre');
        $administrador->Apellido = $request->input('apellido');
        $administrador->Direccion = $request->input('direccion');
        $administrador->Telefono = $request->input('telefono');

        $administrador->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Actualizar Administrador';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Administrador';
        $bitacora->save();

        return redirect()->route('Administrador.index');

    }



    public function destroy( $id)
    {
        $administrador = Administrador::findOrFail($id);

        $administrador->Estado = 0;

        $administrador->update();

        $bitacora = new Bitacora();
        $bitacora->fecha = date('Y-m-d H:i:s');
        $bitacora->nombreUser = auth()->user()->name;
        $bitacora->accion = 'Eliminar Administrador';
        $bitacora->tipo= auth()->user()->rol;
        $bitacora->Categoria = 'Administrador';
        $bitacora->save();

        return redirect()->route('Administrador.index');
    }
}
