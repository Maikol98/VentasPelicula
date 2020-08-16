@extends('layout')

@section('contenido')

<p></p>
<div class="container p-1">
    <div class="row">
        <div class="mx-auto text-center">
            <h1 class="display-4 text-white">Detalle del Ingreso</h1>
            <a href="{{route('Ingreso.index')}}" class="btn btn-lg btn-primary btn-block">Volver</a>
            <table class="table table-responsive py-2">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id Pelicula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingreso as $datos)
                        <tr>
                        <th class="text-white" scope="row">{{$datos->Id_Pelicula}}</th>
                        <td class="text-white">{{$datos->Nombre}}</td>
                        <td class="text-white">{{$datos->Cantidad}}</td>
                        <td class="text-white">{{$datos->Precio}}</td>
                        <td class="text-white">{{$datos->Sutotal}}</td>
                        <td class="text-white"><a class="btn btn-success"
                            href="{{route('Detalleingreso.edit',[$datos->Id_Ingreso,$datos->Id_Pelicula])}}">Editar</a>
                            <form style="display: inline"
                                action="{{route('Detalleingreso.destroy',[$datos->Id_Ingreso,$datos->Id_Pelicula])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
