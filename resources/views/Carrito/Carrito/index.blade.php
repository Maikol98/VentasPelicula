@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">

    <div class="text-center">
        <h1>Todos los Carritos</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descripcion</th>
                <th scope="col">PrecioTotal</th>
                <th scope="col">Cliente</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $datos)
                <tr>
                <th class="text-white" scope="row">{{$datos->Id}}</th>
                <td class="text-white">{{$datos->Descripcion}}</td>
                <td class="text-white">{{$datos->PrecioTotal}}</td>
                <td class="text-white">{{$datos->Nombre}}</td>
                <td class="text-white"><a class="btn btn-primary"
                    href="{{route('Carrito.show',$datos->Id)}}">Detalles</a>
                    <form style="display: inline" action="{{route('Carrito.destroy',$datos->Id)}}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
