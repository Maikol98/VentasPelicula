@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <p><a class="btn btn-success" href="{{route('Administrador.create')}}">Añadir Administrador</a></p>

    <div class="text-center">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Carnet</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administrador as $datos)
                <tr>
                <th class="text-white" scope="row">{{$datos->CI}}</th>
                <td class="text-white">{{$datos->Nombre}}</td>
                <td class="text-white">{{$datos->Apellido}}</td>
                <td class="text-white">{{$datos->Direccion}}</td>
                <td class="text-white">{{$datos->Telefono}}</td>
                <td class="text-white">{{$datos->Email}}</td>
                <td class="text-white"><a class="btn btn-primary" href="{{route('Administrador.edit',$datos->CI)}}">Editar</a>
                    <form style="display:inline" action="{{route('Administrador.destroy',$datos->CI)}}" method="POST">
                        {!!csrf_field()!!}
                        {!!method_field('DELETE')!!}
                        <button type="submit" class="btn btn-danger">Elimnar</button>
                    </form></td>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
