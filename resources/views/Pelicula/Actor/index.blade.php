@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <p><a class="btn btn-success" href="{{route('Actor.create')}}">Añadir Actor</a></p>

    <div class="text-center">

    <table class="table col-10">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Edad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actor as $datos)
                <tr>
                <th class="text-white" scope="row">{{$datos->Id}}</th>
                <td class="text-white">{{$datos->Nombre}}</td>
                <td class="text-white">{{$datos->Nacionalidad}}</td>
                <td class="text-white">{{$datos->Edad}}</td>
                <td class="text-white"><a class="btn btn-primary"
                    href="{{route('Actor.edit',$datos->Id)}}">Editar</a></td>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
