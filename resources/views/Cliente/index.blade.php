@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <p><a class="btn btn-success" href="{{route('Cliente.create')}}">Añadir Cliente</a></p>

    <div class="text-center">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Carnet</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cliente as $datosCliente)
                <tr>
                <th class="text-white" scope="row">{{$datosCliente->CI}}</th>
                <td class="text-white">{{$datosCliente->Nombre}}</td>
                <td class="text-white">{{$datosCliente->Apellido}}</td>
                <td class="text-white">{{$datosCliente->FechaNacimiento}}</td>
                <td class="text-white">{{$datosCliente->Direccion}}</td>
                <td class="text-white">{{$datosCliente->Telefono}}</td>
                <td class="text-white">{{$datosCliente->Email}}</td>
                <td><a class="btn btn-primary" href="{{route('Cliente.edit',$datosCliente->CI)}}">Editar</a>
                    <form style="display:inline" action="{{route('Cliente.destroy',$datosCliente->CI)}}" method="POST">
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
