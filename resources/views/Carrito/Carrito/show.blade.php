@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">

    <div class="text-center">
        <h1>Detalles</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Pelicula</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $datos)
                <tr>
                <th class="text-white" scope="row">{{$datos->Id_Carrito}}</th>
                <td class="text-white">{{$datos->Nombre}}</td>
                <td class="text-white">{{$datos->Cantidad}}</td>
                <td class="text-white">{{$datos->Precio}}</td>
                <td class="text-white">{{$datos->Subtotal}}</td>
                <td class="text-white"><a class="btn btn-primary"
                    href="{{route('Detallecarrito.edit',[$datos->Id_Carrito,$datos->Id_Pelicula])}}">Editar</a>
                    <form style="display: inline" action="{{route('Detallecarrito.destroy',[$datos->Id_Carrito,$datos->Id_Pelicula])}}" method="POST">
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
