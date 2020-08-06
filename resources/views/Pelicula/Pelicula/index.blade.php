@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <p><a class="btn btn-success" href="{{route('Pelicula.create')}}">Añadir Pelicula</a></p>

    <div class="text-center">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Distribucion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valoracion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelicula as $datos)
                <tr>
                <th class="text-white" scope="row">{{$datos->Id}}</th>
                <td class="text-white">{{$datos->Nombre}}</td>
                <td class="text-white">{{$datos->Precio}}</td>
                <td class="text-white">{{$datos->Stock}}</td>
                <td class="text-white">{{$datos->Distribucion}}</td>
                <td class="text-white">{{$datos->Categoria}}</td>
                <td class="text-white">{{$datos->Valoracion}}</td>
                <td class="text-white"><a class="btn btn-success"
                    href="{{route('Pelicula.edit',$datos->Id)}}"><i class="icon ion-md-create"></i></a>
                    <a style="display: inline" class="btn btn-primary"
                    href="{{route('Pelicula.show',$datos->Id)}}"><i class="icon ion-md-eye"></i></a>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
