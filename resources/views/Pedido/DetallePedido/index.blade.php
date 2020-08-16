@extends('layout')
@section('contenido')

    <div class="container">
        <div class="row">
            <div class="mx-auto text-center">
                <h1 class="display-4 text-white">Detalle Pedido</h1>

                <a href="{{route('Pedido.index')}}"
                    class="btn btn-lg btn-primary btn-block">Volver</a>
                <a href="{{route('Detallepedido.index',$id)}}"
                    class="btn btn-lg btn-success btn-block">Añadir Al Pedido</a>

                <table class="table table-responsive py-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido as $datos)
                            <tr>
                                <th scope="row" class="text-white">{{$datos->Nombre}}</th>
                                <td class="text-white">{{$datos->Cantidad}}</td>
                                <td class="text-white">{{$datos->Subtotal}}</td>
                                <td class="text-white">
                                    <form style="display:inline"
                                        action="{{route('Detallepedido.destroy',[$datos->Id_Pelicula,$datos->Id_Pedido])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimnar</button>
                                    </form></td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
