@extends('layout')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="mx-auto text-center">
                <h1 class="display-4 text-white">Bitacora</h1>
                <table class="table table-responsive py-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bitacora as $datos)
                            <tr>
                                <th scope="row" class="text-white">{{$datos->id}}</th>
                                <td class="text-white">{{$datos->fecha}}</td>
                                <td class="text-white">{{$datos->nombreUser}}</td>
                                <td class="text-white">{{$datos->tipo}}</td>
                                <td class="text-white">{{$datos->accion}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('Bitacora.index',$catego='Administrador')}}" class="btn btn-lg btn-primary btn-block">Bitacora Administrador</a>
                <a href="{{route('Bitacora.index',$catego='Cliente')}}" class="btn btn-lg btn-primary btn-block">Bitacora Cliente</a>
                <a href="{{route('Bitacora.index',$catego='Pedido')}}" class="btn btn-lg btn-primary btn-block">Bitacora Pedido</a>
                <a href="{{route('Bitacora.index',$catego='Ingreso')}}" class="btn btn-lg btn-primary btn-block">Bitacora Ingreso</a>
                <a href="{{route('Bitacora.index',$catego='Pelicula')}}" class="btn btn-lg btn-primary btn-block">Bitacora Pelicula</a>
            </div>
        </div>
    </div>
@endsection
