@extends('layout')
@section('contenido')

    <div class="container">
        <div class="row">
            <div class="mx-auto text-center">
                <h1 class="display-4 text-white">Todos los Pedidos</h1>

                <a href="{{route('Pedido.create')}}"
                    class="btn btn-lg btn-primary btn-block">Añadir Nuevo Pedido</a>

                <table class="table table-responsive py-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nro Pedido</th>
                            <th scope="col">Fecha Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Precio Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido as $datos)
                            <tr>
                                <th scope="row" class="text-white">{{$datos->Id}}</th>
                                <td class="text-white">{{$datos->FechaPedido}}</td>
                                <td class="text-white">{{$datos->Nombre}}</td>
                                <td class="text-white">{{$datos->PrecioTotal}}</td>
                                <td class="text-white">{{$datos->Estado}}</td>
                                <td class="text-white">
                                    <a href="{{route('Pedido.show',$datos->Id)}}" class="btn btn-success">Ver</a>
                                    <a href="{{route('Pago.create',$datos->Id)}}" class="btn btn-primary">Pago</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
